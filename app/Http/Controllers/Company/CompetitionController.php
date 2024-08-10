<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use App\Models\Competition;
use App\Models\CompetitionWinner;
use App\Traits\FileStorageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompetitionController extends Controller
{
    use FileStorageTrait ;
    /**
     * Display a listing of the resource.
     */
    public function index($competitionID)
    {
        $competition = Competition::with(['competitors', 'winners' => function ($query) {
            $query->orderBy('rank', 'asc');
        }])->findOrFail($competitionID);

        $competitors = $competition->competitors->map(function ($competitor) use ($competition) {
            $winner = $competition->winners->firstWhere('competitor_id', $competitor->id);
            $competitor->rank = $winner ? $winner->rank : null;
            return $competitor;
        })->sortBy(function ($competitor) {
            return $competitor->rank;
        });
        return view('company.competition.index', compact('competitors'));
    }


    public function create()
    {
        return view('company.competition.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        $image= $this->storefile($request->file('image') , 'Competition Images') ;
        Competition::create([
            'company_id' => Auth::guard('company')->id()
            , 'name'=> $request['name']
            , 'start_date' => $request['start_date']
            , 'end_date' => $request['end_date']
            , 'description' => $request['description']
            , 'image' => $image
        ]) ;
        return redirect()->route('company.dashboard') ;
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
    public function edit($id)
    {
        $competition = Competition::findOrFail($id);
        return view('company.competition.edit', compact('competition'));
    }

    public function update(Request $request, $id)
    {
        $competition = Competition::findOrFail($id);

        // Validate the request
        $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        // Update the competition
        $competition->name = $request->input('name');
        $competition->description = $request->input('description');
        $competition->start_date = $request->input('start_date');
        $competition->end_date = $request->input('end_date');

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('competitions', 'public');
            $competition->image = $imagePath;
        }

        $competition->save();

        return redirect()->route('company.competition.edit', $competition->id)->with('success', 'Competition updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Competition::find($id)->delete() ;

        return redirect()->back();
    }

    public function assignWinner(Request $request, $competitionId)
    {
        $request->validate([
            'competitor_id' => 'required|exists:competitors,id',
            'rank' => 'required|integer|min:1',
        ]);

        // Check if a competitor already has this rank in the same competition
        $existingRank = CompetitionWinner::where('competition_id', $competitionId)
            ->where('rank', $request->input('rank'))
            ->first();

        if ($existingRank) {
            return redirect()->back()->with('error', 'This rank is already assigned to another competitor.');
        }

        // Find existing winner or create a new one
        $competitionWinner = CompetitionWinner::updateOrCreate(
            [
                'competition_id' => $competitionId,
                'competitor_id' => $request->input('competitor_id')
            ],
            [
                'rank' => $request->input('rank')
            ]
        );

        return redirect()->back()->with('success', 'Winner assigned successfully!');
    }


}
