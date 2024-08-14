<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\MobileUser;
use Illuminate\Http\Request;

class UserFollowedTechnologyController extends Controller
{
    public function showFollowedTechnologies(Request $request)
    {
        $userId = $request['mobile_user_id'];
        $followedTechnologies = MobileUser::find($userId)->followedTechnologies;

        return response()->json([
            'status' => 'success',
            'followedTechnologies' => $followedTechnologies
        ], 200);
    }

    public function toggleFollowTechnology(Request $request)
    {
        $technologyId = $request['technology_id'];
        $user = $request->user();

        // Check if the user already follows the technology
        $isFollowing = $user->followedTechnologies()->where('technology_id', $technologyId)->exists();

        if ($isFollowing) {
            // If the user is already following the technology, detach (unfollow) it
            $user->followedTechnologies()->detach($technologyId);
            $message = 'You have unfollowed this technology successfully.';
        } else {
            // If the user is not following the technology, attach (follow) it
            $user->followedTechnologies()->attach($technologyId);
            $message = 'You have followed this technology successfully.';
        }

        return response()->json([
            'status' => 'success',
            'message' => $message
        ], 200);
    }

}
