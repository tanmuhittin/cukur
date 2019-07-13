<?php

namespace App\Http\Controllers;

use App\SlidePerformanceData;
use App\Http\Resources\SlidePerformanceDataCollection;
use App\Http\Resources\SlidePerformanceDataResource;
 
class SlidePerformanceDataAPIController extends Controller
{
    public function index()
    {
        return new SlidePerformanceDataCollection(SlidePerformanceData::paginate());
    }
 
    public function show(SlidePerformanceData $slidePerformanceData)
    {
        return new SlidePerformanceDataResource($slidePerformanceData->load(['slide', 'visit']));
    }

    public function store(Request $request)
    {
        return new SlidePerformanceDataResource(SlidePerformanceData::create($request->all()));
    }

    public function update(Request $request, SlidePerformanceData $slidePerformanceData)
    {
        $slidePerformanceData->update($request->all());

        return new SlidePerformanceDataResource($slidePerformanceData);
    }

    public function destroy(Request $request, SlidePerformanceData $slidePerformanceData)
    {
        $slidePerformanceData->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}