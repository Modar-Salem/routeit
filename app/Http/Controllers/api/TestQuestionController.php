<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Test;
use Illuminate\Http\Request;

class TestQuestionController extends Controller
{
    public function getTestQuestions(Request $request)
    {
        $testId = $request['test_id'];
        $questions = Test::find($testId)->questions;

        return response()->json([
            'status' => 'success',
            'questions' => $questions
        ], 200);
    }
}
