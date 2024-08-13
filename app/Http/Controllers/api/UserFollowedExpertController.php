<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MobileUser;
use Illuminate\Http\Request;

class UserFollowedExpertController extends Controller
{
    public function showFollowedExperts(Request $request)
    {
        $userId = $request['mobile_user_id'];
        $followedExperts = MobileUser::find($userId)->followedExperts;

        return response()->json([
            'status' => 'success',
            'followedExperts' => $followedExperts
        ], 200);
    }

    public function followExpert(Request $request)
    {
        $expertId = $request['expert_id'];
        $user = $request->user();

        $user->followedExperts()->attach($expertId);

        return response()->json([
            'status' => 'success',
            'message' => 'You have followed this expert successfully.'
        ], 200);
    }

    public function unfollowExpert(Request $request)
    {
        $expertId = $request['expert_id'];
        $user = $request->user();

        $user->followedExperts()->detach($expertId);

        return response()->json([
            'status' => 'success',
            'message' => 'You have unfollowed this expert successfully.'
        ], 200);
    }
}
