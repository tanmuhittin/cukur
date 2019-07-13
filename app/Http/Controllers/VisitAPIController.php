<?php

namespace App\Http\Controllers;

use App\Visit;
use App\Http\Resources\VisitCollection;
use App\Http\Resources\VisitResource;
 
class VisitAPIController extends Controller
{
    public function index()
    {
        return new VisitCollection(Visit::paginate());
    }
 
    public function show(Visit $visit)
    {
        return new VisitResource($visit->load(['storyPerformanceData', 'slidePerformanceData']));
    }

    public function store(Request $request)
    {
        return new VisitResource(Visit::create($request->all()));
    }

    public function update(Request $request, Visit $visit)
    {
        $visit->update($request->all());

        return new VisitResource($visit);
    }

    public function destroy(Request $request, Visit $visit)
    {
        $visit->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
