<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Roadmap;
use Illuminate\Http\Request;

class RoadmapsController extends Controller
{
    public function getRoadmaps(Request $request) {
        $roadmaps = Roadmap::where('technology_id', $request->technology_id)->where('technology_level_id', $request->technology_level_id)->get();

        return response()->json([
            'message' => 'Success',
            'roadmaps' => $roadmaps
        ]);
    }

    public function getRoadmapSkills(Request $request) {
        $skills = Roadmap::find($request->roadmap_id)->skills;

        return response()->json([
            'message' => 'Success',
            'skills' => $skills
        ]);
    }
}
