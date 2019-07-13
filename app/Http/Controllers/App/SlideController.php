<?php

namespace App\Http\Controllers\App;

use App\Models\Slide;
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

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
