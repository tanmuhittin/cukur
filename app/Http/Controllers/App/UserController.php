<?php

namespace App\Http\Controllers\App;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;

class UserController extends Controller
{
    public function index()
    {
        return UserCollection::collection(User::paginate());
    }

    public function show(User $user)
    {
        return new UserResource($user->load([]));
    }

    public function store(Request $request)
    {
        return new UserResource(User::create($request->all()));
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());

        return new UserResource($user);
    }

    public function destroy(Request $request, User $user)
    {
        $user->delete();

        return response()->json([], \Illuminate\Http\Response::HTTP_NO_CONTENT);
    }
}
