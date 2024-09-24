<?php

namespace App\Http\Controllers\api;

use App\Events\CommunityMessageEvent;
use App\Http\Controllers\Controller;
use App\Models\Community;
use App\Models\Roadmap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class CommunityController extends Controller
{
    public function sendMessage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'message' => ['required', 'max:10000'],
            'roadmap_id' => ['required', 'int'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        $roadmapId = $request['roadmap_id'];
        $message = $request['message'];

        $roadmap = Roadmap::find($roadmapId);
        if ($roadmap === null) {
            return response()->json([
                'status' => 'failed',
                'message' => 'There is no roadmap with this id.',
            ], 404);
        }

        $message = Community::create([
            'mobile_user_id' => $user['id'],
            'roadmap_id' => $roadmapId,
            'message' => $message,
        ]);

        event(new CommunityMessageEvent($message, $roadmapId));

        return response()->json([
            'status' => 'success',
            'message' => $message,
        ], 200);
    }

    public function showMessages(Request $request)
    {
        $roadmapId = $request['roadmap_id'];
        $messages = DB::table('communities')
            ->join('mobile_users', 'communities.mobile_user_id', '=', 'mobile_users.id')
            ->where('communities.roadmap_id', $roadmapId)
            ->select('communities.*', 'mobile_users.*')->get();

        return response()->json([
            'status' => 'success',
            'message' => $messages,
        ], 200);
    }
}
