<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\RoadmapSkill;
use App\Models\Test;
use App\Models\TestQuestion;
use App\Models\UserPassedTest;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function saveTestResult(Request $request)
    {
        if (!$request['isPassed']) {
            return response()->json([
                'status' => false,
                'message' => 'User does not pass the test.'
            ], 422);
        }

        $user = $request->user();

        UserPassedTest::create([
            'mobile_user_id' => $user['id'],
            'test_id' => $request['test_id'],
            'isPassed' => true
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Test result saved successfully.'
        ], 200);
    }
}
