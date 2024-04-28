<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\TechnologyCategory;
use App\Models\TechnologyLevel;
use Illuminate\Http\Request;

class TechnologyCategoriesController extends Controller
{
    public function getTechnologyCategories()
    {
        $data = TechnologyCategory::all();
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ], 200);
    }

    public function getTechnologies(Request $request)
    {
        $data = TechnologyCategory::find($request['technology_category_id'])->technologies;
        return response()->json([
            'message' => 'Success',
            'data' => $data
        ], 200);
    }

    public function getTechnologyLevels(Request $request) {
        $technologyId = $request->technology_id;
        $levels = TechnologyLevel::where('technology_id', $technologyId)->get();

        return response()->json([
            'message' => 'Success',
            'levels' => $levels
        ], 200);
    }
}
