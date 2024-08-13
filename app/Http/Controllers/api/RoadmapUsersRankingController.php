<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\PreviousWeekRoadmapUsersRanking;
use App\Models\Roadmap;
use App\Models\RoadmapUsersRanking;
use Illuminate\Http\Request;

class RoadmapUsersRankingController extends Controller
{
    public function getRoadmapRanking(Request $request)
    {
        $roadmapId = $request['roadmap_id'];
        $rankedUsers = Roadmap::find($roadmapId)->rankedUsers->sortByDesc('pivot.userXP');

        // Ensure the response is always an array of users
        $ranking = $rankedUsers->values()->toArray();

        return response()->json(['ranking' => $ranking]);
    }
}
