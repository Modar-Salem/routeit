<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use App\Models\Test;
use Illuminate\Http\Request;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tests = Test::all() ;
        return view('admin.test.index' , compact('tests')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $technologies =  Technology::all() ;
        return view('admin.test.create'  , compact('technologies')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'technology_id' => 'required|unique:tests,technology_id'
        ]) ;

        Test::create([
            'technology_id' => $request['technology_id'],
            'total_xp' => 0
        ]) ;
        return redirect()->route('admin.test.index') ;
    }

}
