<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\TechnologyCategory;
use App\Traits\FileStorageTrait;
use Illuminate\Http\Request;

class TechnologyController extends Controller
{
    use FileStorageTrait ;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $technologies = Technology::all() ;
        return view('admin.technology.index' , compact('technologies')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technology_categories = TechnologyCategory::all();
        return view('admin.technology.create' ,compact('technology_categories')) ;
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
            'videos' => 'required|array',
            'videos.*' => 'mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4|max:20000', // 20MB Max per video
            'technology_category_id' => 'required|exists:technology_categories,id' // Assuming technology_categories is the table name
        ]);

        $imagePath = $this->storefile($request['image'] , 'Technology Images') ;

        $videoPaths = json_encode($this->handleFiles($request['videos'], 'Technology Videos'));


        Technology::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'description' => $request->description,
            'description_ar' => $request->description_ar,
            'image' => $imagePath,
            'videos' => $videoPaths,
            'technology_category_id' => $request->technology_category_id
        ]);
        return redirect()->route('admin.technology.index') ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $technology = Technology::find($id) ;
        return view('admin.technology.show' , compact('technology'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $technology = Technology::find($id) ;
        return view('admin.technology.edit' ,compact('technology')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $technology = Technology::find($id) ;
        $technology->update($request->all()) ;
        return redirect()->route('admin.technology.index') ;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $technology = Technology::find($id) ;
        $technology->delete() ;
        return redirect()->route('admin.technology.index') ;
    }
}
