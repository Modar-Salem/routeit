<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TechnologyCategory;
use App\Traits\FileStorageTrait;
use Illuminate\Http\Request;

class TechnologyCategoryController extends Controller
{
    use FileStorageTrait ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technology_categories = TechnologyCategory::all();
        return view('admin.technology_category.index' , compact('technology_categories')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.technology_category.create') ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'name_ar' => 'required|string',
            'description' => 'required|string',
            'description_ar' => 'required|string',
            'image' => 'required|image',
        ]);

        $imagePath = $this->storefile($request['image'] , 'Technology Category Images') ;


        TechnologyCategory::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
            'image' => $imagePath,
        ]);
        return redirect()->route('admin.technology_category.index') ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $technology_category = TechnologyCategory::find($id) ;
        return view('admin.technology_category.show' , compact('technology_category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technology_category = TechnologyCategory::find($id) ;
        return view('admin.technology_category.edit' ,compact('technology_category')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $technology_category = TechnologyCategory::find($id) ;
        $technology_category->update($request->all()) ;
        return redirect()->route('admin.technology_category.index') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technology_category = TechnologyCategory::find($id) ;
        $technology_category->delete() ;
        return redirect()->route('admin.technology_category.index') ;
    }
}
