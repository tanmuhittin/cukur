<?php

namespace App\Http\Controllers\App;

use App\Models\Visit;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\VisitResource;

class VisitController extends Controller
{
    public function index()
    {
        return VisitResource::collection(Visit::paginate());
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

        return new JsonResponse(['message' => 'successfuly deleted.'], Response::HTTP_NO_CONTENT);
    }
}
