<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Roadmap;
use App\Models\RoadmapSkill;
use App\Models\RoadmapSkillArticle;
use App\Models\TechnologyLevel;
use Illuminate\Http\Request;

class RoadmapsController extends Controller
{
    function isEnglish($char)
    {
        $codepoint = mb_ord($char); // Get the Unicode codepoint of the character
        return (($codepoint >= 0x0041 && $codepoint <= 0x005A) || // A-Z
            ($codepoint >= 0x0061 && $codepoint <= 0x007A));   // a-z
    }

    public function getRoadmaps(Request $request)
    {
        $roadmaps = TechnologyLevel::find($request->technology_level_id)->roadmaps;

        return response()->json([
            'message' => 'Success',
            'roadmaps' => $roadmaps
        ], 200);
    }

    public function getRoadmapSkills(Request $request)
    {
        $skills = Roadmap::find($request->roadmap_id)->skills;

        return response()->json([
            'message' => 'Success',
            'skills' => $skills
        ], 200);
    }

    public function getSkillVideos(Request $request)
    {
        $skillVideos = RoadmapSkill::find($request->roadmap_skill_id)->videos;

        return response()->json([
            'message' => 'Success',
            'skillsVideos' => $skillVideos
        ], 200);
    }

    public function getSkillArticles(Request $request)
    {
        $skillArticles = RoadmapSkill::find($request->roadmap_skill_id)->articles;

        return response()->json([
            'message' => 'Success',
            'skillsArticles' => $skillArticles
        ], 200);
    }

    public function getArticleSections(Request $request)
    {
        $articleSections = RoadmapSkillArticle::find($request->article_id)->sections;

        return response()->json([
            'message' => 'success',
            'articleSections' => $articleSections
        ], 200);
    }

    public function roadmapSearch(Request $request)
    {
        $roadmapName = $request['roadmap_name'];
        if ($roadmapName === null) {
            return response()->json([
                'status' => 'Failed',
                'message' => 'roadmap_name field is required'
            ], 422);
        }

        if ($this->isEnglish($roadmapName[0])) {
            $roadmaps = Roadmap::query()
                ->where('title', 'like', '%' . $roadmapName . '%')
                ->get();
        } else {
            $roadmaps = Roadmap::query()
                ->where('title_ar', 'like', '%' . $roadmapName . '%')
                ->get();
        }

        return response()->json([
            'message' => 'Success',
            'roadmaps' => $roadmaps
        ], 200);
    }
}
