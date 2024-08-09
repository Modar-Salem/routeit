<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\Competitor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompetitionWinnerController extends Controller
{
    public function get(Request $request)
    {
        $competitionId = $request['competition_id'];
        $winners = DB::table('competitors')
            ->join('competition_winners', 'competitors.id', '=', 'competition_winners.competitor_id')
            ->join('mobile_users', 'competitors.mobile_user_id', '=', 'mobile_users.id')
            ->select('*')->where('competitors.competition_id', $competitionId)->orderBy('competition_winners.rank')->get();

        return response()->json([
            'status' => 'success',
            'winners' => $winners
        ], 200);
    }
}
