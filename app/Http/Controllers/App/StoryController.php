<?php

namespace App\Http\Controllers\App;

use App\Models\Story;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoryResource;

class StoryController extends Controller
{
    public function index()
    {
        return StoryCollection::collection(Story::paginate());
    }

    public function show(Story $story)
    {
        return new StoryResource($story->load(['slides', 'storyPerformanceData', 'product']));
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
