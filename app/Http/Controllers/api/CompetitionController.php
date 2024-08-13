<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function previous()
    {
        $currentDateTime = Carbon::now();
        $competitions = Competition::where('end_date', '<', $currentDateTime)->get();

        return response()->json([
            'status' => 'success',
            'competitions' => $competitions,
        ], 200);
    }

    public function current()
    {
        $currentDateTime = Carbon::now();
        $competitions = Competition::where('start_date', '<', $currentDateTime)
            ->where('end_date', '>', $currentDateTime)
            ->get();

        return response()->json([
            'status' => 'success',
            'competitions' => $competitions,
        ], 200);
    }

    public function upcoming()
    {
        $currentDateTime = Carbon::now();
        $competitions = Competition::where('start_date', '>', $currentDateTime)->get();

        return response()->json([
            'status' => 'success',
            'competitions' => $competitions,
        ], 200);
    }

    public function all()
    {
        $competitions = Competition::get();

        return response()->json([
            'status' => 'success',
            'competitions' => $competitions,
        ], 200);
    }
}
