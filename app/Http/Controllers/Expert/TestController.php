<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Roadmap;
use App\Models\RoadmapSkill;
use App\Models\Technology;
use App\Models\Test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($skill_id)
    {
        $tests = Test::where('roadmap_skill_id' , $skill_id)->get() ;
        return view('expert.test.index' , compact('tests' ,'skill_id' )) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($skill_id)
    {
        $roadmaps =  Roadmap::where('expert_id' , Auth::id()) ;
        return view('expert.test.create'  , compact('roadmaps' , 'skill_id')) ;
    }

    /**a
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $skill_id)
    {
        $roadmap_skill = RoadmapSkill::find($skill_id) ;

        Test::create([
            'technology_id' => $roadmap_skill->roadmap->level->technology->id,
            'roadmap_skill_id' => $skill_id,
            'total_xp' => $request['total_xp']
        ]) ;

        return redirect()->route('expert.test.index',$skill_id ) ;
    }

}
