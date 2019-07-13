<?php

namespace App\Http\Controllers;

use App\Slide;
use App\Http\Resources\SlideCollection;
use App\Http\Resources\SlideResource;
 
class SlideAPIController extends Controller
{
    public function index()
    {
        return new SlideCollection(Slide::paginate());
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
