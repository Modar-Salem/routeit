<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Expert;
use App\Models\MobileUser;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function generalSearch(Request $request)
    {
        $word = $request['word'];

        $students = MobileUser::query()->where('name', 'like', '%' . $word . '%')
            ->get();
        $result['students'] = $students;

        $experts = Expert::query()->where('name', 'like', '%' . $word . '%')
            ->get();
        $result['experts'] = $experts;

        $companies = Company::query()->where('name', 'like', '%' . $word . '%')
            ->get();
        $result['companies'] = $companies;

        return response()->json([
            'status' => 'success',
            'result' => $result
        ], 200);
    }
}
