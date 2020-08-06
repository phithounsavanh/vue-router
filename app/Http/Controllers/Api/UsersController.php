<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\User;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;


class UsersController extends Controller
{
    public function index()
    {   
        return UserResource::collection(User::paginate(15));
    }
    public function show(User $user)
    {
        return new UserResource($user);
    }
    public function update(User $user, Request $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $user->update($data);

        return new UserResource($user);
    }

    public function store(Request $request){
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
        ]);

        return new UserResource(User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]));
    }

    public function destroy(User $user){
        $user->delete();
        return response(null, 204);
    }
}
