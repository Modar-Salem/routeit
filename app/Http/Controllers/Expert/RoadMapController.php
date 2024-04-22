<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Roadmap;
use App\Models\Technology;
use App\Models\TechnologyLevel;
use App\Traits\FileStorageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoadMapController extends Controller
{
    use FileStorageTrait ;
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies = Technology::all() ;
        return view('expert.roadmap.create' , compact('technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'technology_id' => 'required|exists:technologies,id',
            'level' => 'required|in:junior,mid-level,senior' ,
            'title' => 'required|string|max:255',
            'title_ar' => 'required|string|max:255',
            'description' => 'required|string',
            'description_ar' => 'required|string',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Max size 2MB
            'introductory_video' => 'required|mimes:mp4',
            'target_cv' => 'required|file|mimes:pdf,doc,docx|max:2048', // Max size 2MB
        ]);

        $data = $request->all();
        $data['technology_level_id'] = TechnologyLevel::where('technology_id' , $request['technology_id'])->where('level' , $request['level'])->first()->id;
        $data['expert_id'] = Auth::guard('expert')->id() ;

        if ($request->hasFile('introductory_video')) {
            $introductory_video = $this->storefile($request->file('introductory_video') , 'RoadMap introductory_video');
            $data['introductory_video'] = $introductory_video;
        }
        if ($request->hasFile('cover')) {
            $cover = $this->storefile($request->file('cover') , 'RoadMap Cover');
            $data['cover'] = $cover;
        }
        if ($request->hasFile('target_cv')) {
            $targetCv = $this->storefile($request->file('target_cv') , 'RoadMap CV');
            $data['target_cv'] = $targetCv;
        }

        Roadmap::create($data);

        return redirect()->route('expert.dashboard')->with('success', 'Record created successfully!');
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
        //
    }
}
