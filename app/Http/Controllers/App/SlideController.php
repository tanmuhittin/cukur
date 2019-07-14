<?php

namespace App\Http\Controllers\App;

use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\SlideResource;

class SlideController extends Controller
{
    public function index()
    {
        return SlideResource::collection(Slide::paginate());
    }

    public function show(Slide $slide)
    {
        return new SlideResource($slide->load(['slidePerformanceData', 'story']));
    }

    public function store(Request $request)
    {
        return new SlideResource(Slide::create($request->all()));
    }

    public function update(Request $request, Slide $slide)
    {
        $slide->update($request->all());

        return new SlideResource($slide);
    }

    public function destroy(Request $request, Slide $slide)
    {
        $slide->delete();

        return new JsonResponse(['message' => 'successfuly deleted.'], Response::HTTP_NO_CONTENT);
    }
}
