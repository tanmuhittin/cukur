<?php

namespace App\Http\Controllers\App;

use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Resources\StoryResource;

class StoryController extends Controller
{
    public function index()
    {
        return StoryResource::collection(Story::paginate());
    }

    public function show(Story $story)
    {
        return new StoryResource($story->load(['slides', 'product']));
    }

    public function store(Request $request)
    {
        return new StoryResource(Story::create($request->all()));
    }

    public function update(Request $request, Story $story)
    {
        $story->update($request->all());

        return new StoryResource($story);
    }

    public function destroy(Request $request, Story $story)
    {
        $story->delete();

        return new JsonResponse(['message' => 'successfuly deleted.'], Response::HTTP_NO_CONTENT);
    }
}
