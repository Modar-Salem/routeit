<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\MobileUser;
use App\Models\RoadmapSkill;
use App\Models\UserCommentReply;
use App\Models\UserSkillComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserSkillCommentController extends Controller
{
    public function get(Request $request)
    {
        $roadmap_skill_id = $request['roadmap_skill_id'];
        $comments = DB::table('user_skill_comments')
            ->join('user_skill_commentables', 'user_skill_comments.id', '=', 'user_skill_commentables.user_skill_comment_id')
            ->where('user_skill_comments.roadmap_skill_id', $roadmap_skill_id)
            ->select('user_skill_comments.*', 'user_skill_commentables.*')->get();

        foreach ($comments as $comment) {
            if ($comment->user_skill_commentables_type === "App\Models\MobileUser") {
                $user = MobileUser::find($comment->user_skill_commentables_id);
                $comment->mobile_user_id = $user['id'];
                $comment->birth_date = $user['birth_date'];
                $comment->it_student = $user['it_student'];
                $comment->university = $user['university'];

            } else {
                $user = Expert::find($comment->user_skill_commentables_id);
                $comment->expert_id = $user['id'];
            }
            $comment->name = $user['name'];
            $comment->image = $user['image'];
            $comment->bio = $user['bio'];

            unset($comment->user_skill_comment_id);
            unset($comment->user_skill_commentables_id);
            unset($comment->user_skill_commentables_type);
        }

        return response()->json([
            'status' => 'success',
            'comments' => $comments
        ], 200);
    }

    public function add(Request $request)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'comment' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        $user->comments()->create([
            'roadmap_skill_id' => $data['roadmap_skill_id'],
            'comment' => $data['comment']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Comment added successfully'
        ], 200);
    }

    public function edit(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'comment' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        $comment = UserSkillComment::join('user_skill_commentables', 'user_skill_comments.id', '=', 'user_skill_commentables.user_skill_comment_id')
            ->where('user_skill_comments.id', $data['comment_id'])
            ->select('user_skill_comments.*', 'user_skill_commentables.*')->first();

        if ($comment->user_skill_commentables_id !== $user['id']) {
            return response()->json([
                'status' => false,
                'message' => 'This comment does not belong to the logged in user.'
            ], 403);
        }

        $comment->update([
            'comment' => $data['comment']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Comment updated successfully'
        ], 200);
    }

    public function delete(Request $request)
    {
        $comment = UserSkillComment::join('user_skill_commentables', 'user_skill_comments.id', '=', 'user_skill_commentables.user_skill_comment_id')
            ->where('user_skill_comments.id', $request['comment_id'])
            ->select('user_skill_comments.*', 'user_skill_commentables.*')->first();
        $user = $request->user();

        if ($comment->user_skill_commentables_id !== $user['id']) {
            return response()->json([
                'status' => false,
                'message' => 'This comment does not belong to the logged in user.'
            ], 403);
        }

        $comment->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Comment and its replies deleted successfully'
        ], 200);
    }
}
