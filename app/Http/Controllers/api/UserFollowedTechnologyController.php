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

    public function followTechnology(Request $request)
    {
        $technologyId = $request['technology_id'];
        $user = $request->user();

        $user->followedTechnologies()->attach($technologyId);

        return response()->json([
            'status' => 'success',
            'message' => 'You have followed this technology successfully.'
        ], 200);
    }

    public function unfollowTechnology(Request $request)
    {
        $technologyId = $request['technology_id'];
        $user = $request->user();

        $user->followedExperts()->detach($technologyId);

        return response()->json([
            'status' => 'success',
            'message' => 'You have unfollowed this technology successfully.'
        ], 200);
    }
}
