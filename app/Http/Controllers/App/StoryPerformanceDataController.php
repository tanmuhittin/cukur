<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoryPerformanceDataRequest;
use App\Models\StoryPerformanceData;
use App\Http\Resources\StoryPerformanceDataResource;
use App\Models\Visit;
use Illuminate\Http\Request;

class StoryPerformanceDataController extends Controller
{
    public function index()
    {
        return StoryPerformanceDataResource::collection(StoryPerformanceData::paginate());
    }

    public function show(StoryPerformanceData $storyPerformanceData)
    {
        return new StoryPerformanceDataResource($storyPerformanceData->load(['story', 'visit']));
    }

    public function store(StoryPerformanceDataRequest $request)
    {
        return 1;
        $visit_id = Visit::firstOrCreate(['uuid'=>$request->get('uuid')])->id;
        $story_data = StoryPerformanceData::firstOrNew([
            'visit_id'=> $visit_id,
            'story_id'=> $request->get('story_id')
        ]);
        $story_data[$request->get('data_label')] = $request->get('data_value');
        return $story_data->save();
    }

}
