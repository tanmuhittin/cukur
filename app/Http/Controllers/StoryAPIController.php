<?php

namespace App\Http\Controllers;

use App\Story;
use App\Http\Resources\StoryCollection;
use App\Http\Resources\StoryResource;
 
class StoryAPIController extends Controller
{
    public function index()
    {
        return new StoryCollection(Story::paginate());
    }
 
    public function show(Story $story)
    {
        return new StoryResource($story->load(['storyPerformanceData', 'product']));
    }

    public function store(Request $request)
    {
        return new StoryResource(Story::create($request->all()));
    }

    public function update(Request $request, Story $story)
    {
        $story->update($request->all());

        return new StoryResource($story);
    }

    public function destroy(Request $request, Story $story)
    {
        $story->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
