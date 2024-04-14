<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\TechnologyCategory;
use Illuminate\Http\Request;

class TechnologyCategoriesController extends Controller
{
    public function getTechnologyCategories()
    {
        return TechnologyCategory::all();
    }

    public function getTechnologies(Request $request)
    {
        return TechnologyCategory::find($request['technology_category_id'])->technologies;
    }
}
