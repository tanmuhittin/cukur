<?php

namespace App\Http\Controllers\App;

use App\Models\Slide;
use App\Models\Story;
use App\Models\Visit;
use Illuminate\Http\Response;
use App\Models\PerformanceData;
use Illuminate\Http\JsonResponse;
use App\Jobs\CalculateSlideScore;
use App\Http\Controllers\Controller;
use App\Http\Requests\PerformanceDataRequest;
use App\Http\Resources\PerformanceDataResource;

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
        $visitId = Visit::firstOrCreate(['uuid'=>$request->get('uuid')])->id;
        $request->merge(['visit_id' => $visitId]);
        $data = $request->except('uuid');
        $model = new PerformanceDataResource(PerformanceData::create($data));
        $this->dispatch(new CalculateSlideScore(Slide::find($model->slide_id)->story->id));
        return new JsonResponse(['message' => 'successfully stored.'], Response::HTTP_CREATED);
    }
}
