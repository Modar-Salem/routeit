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
        $technologyCategoryId = $request['technology_category_id'];
        $data = TechnologyCategory::find($technologyCategoryId)->technologies;

        return response()->json([
            'message' => 'Success',
            'data' => $data
        ], 200);
    }

    public function getTechnologyLevels(Request $request)
    {
        $technologyId = $request['technology_id'];
        $levels = Technology::find($technologyId)->levels;

        return response()->json([
            'message' => 'Success',
            'levels' => $levels
        ], 200);
    }

    public function searchTechnologyCategories(Request $request)
    {
        if ($request->name === null) {
            $technologyCategories = TechnologyCategory::query()
                ->where('name_ar', 'like', '%' . $request->name_ar . '%')
                ->get();
        } else {
            $technologyCategories = $technologyCategories = TechnologyCategory::query()
                ->where('name', 'like', '%' . $request->name . '%')
                ->get();
        }

        return response()->json([
            'message' => 'Success',
            'technologyCategories' => $technologyCategories
        ], 200);
    }

    public function searchTechnologies(Request $request)
    {

    }
}
