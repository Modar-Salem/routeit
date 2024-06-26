<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expert;
use Illuminate\Http\Request;

class ExpertController extends Controller
{
    public function index()
    {
        $experts= Expert::all() ;
        return view('admin.expert.index' , compact('experts')) ;
    }
    public function block($id){

        $expert = Expert::find($id) ;
        if(!$expert)
        {
            return redirect()->back() ;
        }
        if($expert->type == 'normal')
            $expert->update([
                'type' => 'blocked'
            ]);

        elseif($expert->type == 'blocked')
            $expert->update([
                'type' => 'normal'
            ]);

        $expert->tokens()->delete();
        return redirect()->back() ;
    }
}
