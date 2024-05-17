<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use App\Models\MobileUser;
use App\Models\UserCommentReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserCommentReplyController extends Controller
{
    public function get(Request $request)
    {
        $comment_id = $request['comment_id'];
        $replies = DB::table('user_comment_replies')
            ->join('user_comment_repliesables', 'user_comment_replies.id', '=', 'user_comment_repliesables.user_comment_reply_id')
            ->where('user_comment_replies.skill_comment_id', $comment_id)
            ->select('user_comment_replies.*', 'user_comment_repliesables.*')->get();

        foreach ($replies as $reply) {
            if ($reply->user_comment_repliesables_type === "App\Models\MobileUser") {
                $user = MobileUser::find($reply->user_comment_repliesables_id);
                $reply->mobile_user_id = $user['id'];
                $reply->birth_date = $user['birth_date'];
                $reply->it_student = $user['it_student'];
                $reply->university = $user['university'];
            } else {
                $user = Expert::find($reply->user_skill_commentables_id);
                $reply->expert_id = $user['id'];
            }
            $reply->name = $user['name'];
            $reply->image = $user['image'];
            $reply->bio = $user['bio'];

            unset($reply->user_comment_reply_id);
            unset($reply->user_comment_repliesables_id);
            unset($reply->user_comment_repliesables_type);
        }

        return response()->json([
            'status' => 'success',
            'replies' => $replies
        ], 200);
    }

    public function add(Request $request) {
        $data = $request->all();

        $validator = Validator::make($data, [
            'reply' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        $user->commentReplies()->create([
            'skill_comment_id' => $data['comment_id'],
            'reply' => $data['reply']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Reply added successfully'
        ], 200);
    }

    public function edit(Request $request) {
        $data = $request->all();
        $validator = Validator::make($data, [
            'reply' => ['required']
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        $reply = UserCommentReply::join('user_comment_repliesables', 'user_comment_replies.id', '=', 'user_comment_repliesables.user_comment_reply_id')
            ->where('user_comment_replies.id', $data['reply_id'])
            ->select('user_comment_replies.*', 'user_comment_repliesables.*')->first();

        if ($reply->user_comment_repliesables_id !== $user['id']) {
            return response()->json([
                'status' => false,
                'message' => 'This reply does not belong to the logged in user.'
            ], 403);
        }

        $reply->update([
            'reply' => $data['reply']
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Reply updated successfully'
        ], 200);
    }

    public function delete(Request $request) {
        $reply = UserCommentReply::join('user_comment_repliesables', 'user_comment_replies.id', '=', 'user_comment_repliesables.user_comment_reply_id')
            ->where('user_comment_replies.id', $request['reply_id'])
            ->select('user_comment_replies.*', 'user_comment_repliesables.*')->first();
        $user = $request->user();

        if ($reply->user_comment_repliesables_id !== $user['id']) {
            return response()->json([
                'status' => false,
                'message' => 'This reply does not belong to the logged in user.'
            ], 403);
        }

        DB::table('user_comment_repliesables')->where('user_comment_reply_id', '=', $request['reply_id'])->delete();
        $reply->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Reply deleted successfully'
        ], 200);
    }
}
