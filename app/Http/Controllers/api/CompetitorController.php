<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CompetitorController extends Controller
{
    public function register(Request $request)
    {
        $user = $request->user();
        $currentDateTime = Carbon::now();
        $competitionId = $request['competition_id'];
        $competition = Competition::find($competitionId);
        $isRegistered = $user->competitions->contains('id', $competitionId);

        if ($isRegistered) {
            return response()->json([
                'status' => false,
                'message' => 'You have already registered to this competition.'
            ], 409);
        } elseif ($currentDateTime > $competition['end_date']) {
            return response()->json([
                'status' => false,
                'message' => 'This competition is over.'
            ], 403);
        } elseif ($currentDateTime < $competition['start_date']) {
            return response()->json([
                'status' => false,
                'message' => 'This competition does not start yet.'
            ], 403);
        } else {
            $user->competitions()->attach($competitionId);

            return response()->json([
                'status' => true,
                'message' => 'You have registered to this competition successfully.'
            ], 200);
        }
    }

    public function editProjectLink(Request $request)
    {
        $data = $request->all();
        $validator = Validator::make($data, [
            'project_link' => ['required', 'string', 'max:2048'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => "There is something incorrect",
                'errors' => $validator->errors()
            ], 422);
        }

        $user = $request->user();
        $competitionId = $data['competition_id'];
        $projectLink = $data['project_link'];

        $competition = $user->competitions->find($competitionId);
        if ($competition === null) {
            return response()->json([
                'status' => 'false',
                'message' => 'This competition does not exist.'
            ], 404);
        }

        $competition->pivot->project_link = $projectLink;
        $competition->pivot->save();

        return response()->json([
            'status' => 'true',
            'message' => 'Your project\'s URL have updated successfully.'
        ], 404);
    }

    public function competitions(Request $request)
    {
        $user = $request->user();
        $competitions = $user->competitions;

        return response()->json([
            'status' => 'true',
            'competitions' => $competitions
        ], 200);
    }

    public function competitorDetails(Request $request)
    {
        $user = $request->user();
        $competitionId = $request['competition_id'];
        $competition = $user->competitions->find($competitionId);
        if ($competition === null) {
            return response()->json([
                'status' => 'false',
                'message' => 'This competition does not exist.'
            ], 404);
        }

        $competitor = $competition->pivot;

        return response()->json([
            'status' => 'true',
            'competitor Details' => $competitor
        ], 404);
    }
}
