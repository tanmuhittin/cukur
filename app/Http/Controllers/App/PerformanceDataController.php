<?php

namespace App\Http\Controllers\App;

use App\Http\Controllers\Controller;
use App\Http\Requests\PerformanceDataRequest;
use App\Http\Resources\PerformanceDataResource;
use App\Jobs\CalculateSlideScore;
use App\Models\PerformanceData;
use App\Models\Slide;
use App\Models\Story;
use App\Models\Visit;

class PerformanceDataController extends Controller
{
    public function index()
    {
        return PerformanceDataResource::collection(PerformanceData::paginate());
    }

    public function show(PerformanceData $performanceData)
    {
        return new PerformanceDataResource($performanceData->load(['visit']));
    }

    public function store(PerformanceDataRequest $request)
    {
        $visit_id = Visit::firstOrCreate(['uuid'=>$request->get('uuid')])->id;
        $request->merge(['visit_id' => $visit_id]);
        $data = $request->except('uuid');
        $model = new PerformanceDataResource(PerformanceData::create($data));
        $this->dispatch(new CalculateSlideScore(Slide::find($model->slide_id)->story->id));
        return 1;
    }
}
