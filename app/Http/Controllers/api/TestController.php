<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RoadmapSkill;
use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function getTest(Request $request)
    {
        $roadmap_skill_id = $request['roadmap_skill_id'];
        $test = RoadmapSkill::find($roadmap_skill_id)->test;

        return response()->json([
            'status' => 'Success',
            'test' => $test
        ], 200);
    }

    public function getTestResult(Request $request)
    {
        $testId = $request['test_id'];
        $userAnswers = $request->all();
        unset($userAnswers['test_id']);

        $questions = Test::find($testId)->questions;

        $userXP = 0;
        foreach ($userAnswers as $key => $value) {
            for ($i = 0; $i < sizeof($questions); $i++) {
                if ($questions[$i]['id'] === $key) {
                    if ($questions[$i]['correct_option'] === $value) {
                        $userXP += $questions[$i]['xp'];
                    }
                    break;
                }
            }
        }

        /* Not Completed Yet */
    }
}
