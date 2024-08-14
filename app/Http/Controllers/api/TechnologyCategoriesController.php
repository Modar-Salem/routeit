<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\TechnologyCategory;
use App\Models\TechnologyLevel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TechnologyCategoriesController extends Controller
{
    function isEnglish($char)
    {
        $codepoint = mb_ord($char); // Get the Unicode codepoint of the character
        return (($codepoint >= 0x0041 && $codepoint <= 0x005A) || // A-Z
            ($codepoint >= 0x0061 && $codepoint <= 0x007A));   // a-z
    }

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
        $name = $request['name'];
        if ($name === null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'Name field is required'
            ], 422);
        }

        if ($this->isEnglish($name[0])) {
            $technologies = Technology::query()
                ->where('name', 'like', '%' . $name . '%')
                ->get();
        } else {
            $technologies = Technology::query()
                ->where('name_ar', 'like', '%' . $name . '%')
                ->get();
        }

        return response()->json([
            'message' => 'Success',
            'technologies' => $technologies
        ], 200);
    }
}
