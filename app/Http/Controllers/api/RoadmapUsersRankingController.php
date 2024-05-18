<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Roadmap;
use Illuminate\Http\Request;

class RoadmapUsersRankingController extends Controller
{
    public function getRoadmapRanking(Request $request) {
        $roadmapId = $request['roadmap_id'];
        $rankedUsers = Roadmap::find($roadmapId)->rankedUsers->sortByDesc('pivot.userXP');
        return $rankedUsers;
    }
}
