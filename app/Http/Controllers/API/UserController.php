<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(): JsonResource
    {
        return UserResource::collection(User::all());
    }

    public function store(Request $request): JsonResource
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'password' => Hash::make('password')
        ]);

        return new UserResource($user);
    }

    public function show(User $user): JsonResource
    {
        return new UserResource($user);
    }

    public function update(Request $request, User $user): JsonResource
    {
        $user->update($request->validate([
            'first_name' => 'string|max:255',
            'last_name' => 'string|max:255',
            'email' => 'email|unique:users',
        ]));

        return new UserResource($user);
    }

    public function destroy(Request $request,User $user): JsonResource
    {
        $user->find($request->id);
        $user->delete();

        return UserResource::collection(User::all());
    }
}
