<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;

use App\Models\RoadmapSkill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($roadmap_id)
    {
        $skills = RoadmapSkill::where('roadmap_id' ,$roadmap_id )->get();
        return view('expert.skills.index',compact('skills', 'roadmap_id')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($roadmap_id)
    {
        return view('expert.skills.create',compact('roadmap_id')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store($roadmap_id,Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:30'
        ]);
        RoadmapSkill::create([
            'roadmap_id' =>$roadmap_id
            , 'title' => $request['title']
        ]) ;
        return redirect()->route('expert.skills.index' , $roadmap_id) ;

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = RoadmapSkill::find($id) ;

        $skill->delete() ;
        return redirect()->back() ;

    }

    public function getSkillVideosBlogs(string $id)
    {
    }

    public function getdetailsSkillVideosBlogs(string $id)
    {

    }

    public function destroySkillVideosBlogs(string $id)
    {

    }
}
