<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Competition;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CompetitionController extends Controller
{
    public function previous()
    {
        $currentDateTime = Carbon::now();
        $competitions = Competition::where('end_date', '<', $currentDateTime)->get();

        foreach ($competitions as $competition) {
            $company = Company::find($competition['company_id']);

            $competition['company_image'] = $company['image'];
            $competition['company_name'] = $company['name'];
            $competition['isFinished'] = true;
        }

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

        foreach ($competitions as $competition) {
            $company = Company::find($competition['company_id']);

            $competition['company_image'] = $company['image'];
            $competition['company_name'] = $company['name'];
            $competition['isFinished'] = false;
        }

        return response()->json([
            'status' => 'success',
            'competitions' => $competitions,
        ], 200);
    }

    public function upcoming()
    {
        $currentDateTime = Carbon::now();
        $competitions = Competition::where('start_date', '>', $currentDateTime)->get();

        foreach ($competitions as $competition) {
            $company = Company::find($competition['company_id']);

            $competition['company_image'] = $company['image'];
            $competition['company_name'] = $company['name'];
            $competition['isFinished'] = false;
        }

        return response()->json([
            'status' => 'success',
            'competitions' => $competitions,
        ], 200);
    }

    public function all()
    {
        $currentDateTime = Carbon::now();
        $competitions = Competition::get();

        foreach ($competitions as $competition) {
            $company = Company::find($competition['company_id']);

            $competition['company_image'] = $company['image'];
            $competition['company_name'] = $company['name'];

            if ($competition['end_date'] < $currentDateTime) {
                $competition['isFinished'] = true;
            } else {
                $competition['isFinished'] = false;
            }
        }

        return response()->json([
            'status' => 'success',
            'competitions' => $competitions,
        ], 200);
    }
}
