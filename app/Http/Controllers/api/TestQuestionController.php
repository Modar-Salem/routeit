<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RoadmapSkill;
use App\Models\Test;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function getTestQuestions(Request $request)
    {
        $test = RoadmapSkill::find($request['roadmap_skill_id'])->test;

        if($test === null) {
            return response()->json([
                'message' => 'There is no test for this skill.'
            ], 204);
        }

        $totalXp = $test['total_xp'];
        $questions = $test->questions;

        $result = [
            'total_xp' => $totalXp,
            'questions' => $questions,
        ];

        return response()->json([
            'status' => 'success',
            'result' => $result
        ], 200);
    }
}
