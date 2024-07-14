<?php

namespace App\Http\Controllers\Expert;

use App\Http\Controllers\Controller;
use App\Models\ArticleSection;
use App\Models\RoadmapSkill;
use App\Models\RoadmapSkillArticle;
use App\Models\RoadmapSkillVideo;
use App\Traits\FileStorageTrait;
use Illuminate\Http\Request;

class SkillContentController extends Controller
{
    use FileStorageTrait ;
    /**
     * Display a listing of the resource.
     */
    public function index(string $skill_id)
    {

        $skill = RoadmapSkill::find($skill_id) ;

        $videos = $skill->videos ;
        $blogs = $skill->articles ;
        return view('expert.skills_content.index' , compact('videos' ,'blogs' ,'skill_id')) ;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(string $skill_id)
    {
        return view('expert.skills_content.create' , compact('skill_id')) ;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(string $skill_id , Request $request)
    {
        $request->validate([
            'type' => 'required | in:video,blog'
        ]);
        if($request['type'] == 'video')
        {
            $request->validate([
                'title' => 'required|string|max:200' ,
                'video' => 'required'
            ]);
            $video_path =  $this->storefile($request->file('video') , 'Content Video') ;
            $video_path = $this->processVideoForHLS($video_path , 'SkillContentHLS') ;
            RoadmapSkillVideo::create([
                'roadmap_skill_id' => $skill_id ,
                'title' => $request['title'] ,
                'video' => $video_path
            ]);
        }else if ($request['type'] == 'blog')
        {
            $request->validate([
                'title' => 'required|string|max:255',
                'section_title.*' => 'required|string|max:255',
                'section_content.*' => 'required|string',
                'section_image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            // Create new article
            $article = RoadmapSkillArticle::create([
                'roadmap_skill_id' => $skill_id,
                'title' => $request->title,
            ]);

            // Create article sections
            if ($request->has('section_title')) {
                foreach ($request->section_title as $key => $title) {
                    $section = new ArticleSection();
                    $section->article_id = $article->id;
                    $section->title = $request->section_title[$key];
                    $section->content = $request->section_content[$key];
                    if ($request->hasFile('section_image') && $request->file('section_image')[$key]->isValid()) {
                        $imagePath = $this->storefile($request->file('section_image')[$key] , 'article_images');
                        $section->image = $imagePath;
                    }
                    $section->save();
                }
            }

        }
        return redirect()->route('expert.skills_content.index' ,$skill_id ) ;
    }

    /**
     * Display the specified resource.
     */
    public function showVideo(string $id)
    {
        $video = RoadmapSkillVideo::find($id) ;
        return view('expert.skills_content.show_video' , compact('video'));
    }

    public function showBlog(string $id)
    {
        $article = RoadmapSkillArticle::find($id) ;

        return view('expert.skills_content.show_blog' , compact('article'));
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
