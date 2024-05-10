<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RoadmapSkill;
use App\Models\SkillComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CommentController extends Controller
{
    public function getSkillComments(Request $request)
    {
        $roadmap_skill_id = $request['roadmap_skill_id'];
        $comments = SkillComment::where('roadmap_skill_id', $roadmap_skill_id)->get();

        return response()->json([
            'status' => 'success',
            'comments' => $comments
        ], 200);
    }

    public function addSkillComment(Request $request)
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

        SkillComment::create([
            'mobile_user_id' => $user['id'],
            'roadmap_skill_id' => $data['roadmap_skill_id'],
            'comment' => $data['comment']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Comment added successfully'
        ], 200);
    }

    public function editSkillComment(Request $request)
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
        $comment = SkillComment::where('id', $data['comment_id'])->first();

        if ($comment['mobile_user_id'] !== $user['id']) {
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
}
