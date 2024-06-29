<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserFollowedTechnologyController extends Controller
{
    public function showFollowedTechnologies(Request $request)
    {
        $user = $request->user();
        $followedTechnologies = $user->followedTechnologies()->get();

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
