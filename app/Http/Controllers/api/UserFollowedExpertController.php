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

    public function toggleFollowExpert(Request $request)
    {
        $expertId = $request['expert_id'];
        $user = $request->user();

        // Check if the user already follows the expert
        $isFollowing = $user->followedExperts()->where('expert_id', $expertId)->exists();

        if ($isFollowing) {
            // If the user is already following the expert, detach (unfollow) them
            $user->followedExperts()->detach($expertId);
            $message = 'You have unfollowed this expert successfully.';
        } else {
            // If the user is not following the expert, attach (follow) them
            $user->followedExperts()->attach($expertId);
            $message = 'You have followed this expert successfully.';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message
        ], 200);
    }
}
