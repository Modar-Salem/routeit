<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function getExpertProfile(Request $request)
    {
        $expertId = $request['expert_id'];
        $expert = Expert::find($expertId);

        return response()->json([
            'status' => 'success',
            'student' => $expert
        ], 200);
    }
}
