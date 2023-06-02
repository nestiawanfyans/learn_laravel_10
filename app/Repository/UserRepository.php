<?php

namespace App\Repository;

use App\Contracts\UsersContracts;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Gate;

class UserRepository implements UsersContracts {

    public function allUser(): Collection
    {
        return User::all();
    }

    public function detailUser(string $id): User|bool
    {
        $detailUser = User::find($id);
        return match ($detailUser != null) {
            true => $detailUser,
            false => false
        };
    }

    public function update(string $id, UpdateUserRequest $request): User|JsonResponse
    {
        $request->validated();
        $update = User::findOrFail($id)->update($request->all());
        return match ($update) {
            true => User::find($id),
            false => response()->json(['Message' => "404 Not Found"], 404),
        };
    }


}

