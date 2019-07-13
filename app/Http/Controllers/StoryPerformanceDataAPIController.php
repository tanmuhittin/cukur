<?php

namespace App\Http\Controllers;

use App\StoryPerformanceData;
use App\Http\Resources\StoryPerformanceDataCollection;
use App\Http\Resources\StoryPerformanceDataResource;
 
class StoryPerformanceDataAPIController extends Controller
{
    public function index()
    {
        return new StoryPerformanceDataCollection(StoryPerformanceData::paginate());
    }
 
    public function show(StoryPerformanceData $storyPerformanceData)
    {
        return new StoryPerformanceDataResource($storyPerformanceData->load(['story', 'visit']));
    }

    public function store(Request $request)
    {
        return new StoryPerformanceDataResource(StoryPerformanceData::create($request->all()));
    }

    public function update(Request $request, StoryPerformanceData $storyPerformanceData)
    {
        $storyPerformanceData->update($request->all());

        return new StoryPerformanceDataResource($storyPerformanceData);
    }

    public function destroy(Request $request, StoryPerformanceData $storyPerformanceData)
    {
        $storyPerformanceData->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
