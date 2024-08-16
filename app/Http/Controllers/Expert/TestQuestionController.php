<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\Test;
use App\Models\TestQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(string $test_id)
    {
        $test = Test::find($test_id) ;
        $test_questions  = $test->questions ;

        return view('expert.test_question.index' , compact('test_questions' , 'test_id')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $test_id)
    {
        return view('expert.test_question.create',compact('test_id')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $test_id)
    {
        $request->validate([
            'question' => 'required|string|max:255' ,
            'xp'  => 'required|integer' ,
            'correct_option' => 'required|in:1,2,3,4,5',
            'option1' => 'required|string|max:255' ,
            'option2' => 'required|string|max:255' ,
            'option3' => 'nullable|string|max:255' ,
            'option4' => 'nullable|string|max:255' ,
            'option5' => 'nullable|string|max:255' ,
        ]);

        DB::beginTransaction();
        try {
            $test = Test::find($test_id) ;
            $test->update([
                'total_xp' => $test->total_xp + $request['xp']
            ]);
            TestQuestion::create([
                'test_id' => $test_id ,
                'question' => $request['question'] ,
                'xp'  => $request['xp'] ,
                'correct_option' =>$request['correct_option'],
                'option1' => $request['option1'] ,
                'option2' => $request['option2'] ,
                'option3' => $request['option3'] ?? null ,
                'option4' => $request['option4'] ?? null ,
                'option5' => $request['option5'] ?? null,
            ]);
            DB::commit();
        }catch (\Throwable $throwable)
        {
            DB::rollBack();
            throw  $throwable ;
        }
        return redirect()->route('expert.test_question.index' , $test_id) ;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $test_question = TestQuestion::find($id) ;
        return view('expert.test_question.show' , compact('test_question')) ;
    }

}
