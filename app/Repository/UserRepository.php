<?php

namespace App\Repository;

use App\Contracts\UsersContracts;
use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

class UserRepository implements UsersContracts {

    public function allUser(): Collection
    {
        return User::all();
    }

    public function detailUser(string $id): User
    {
        $detailUser = User::find($id);
        return $detailUser;
    }

    public function update(string $id, UpdateUserRequest $request): User|JsonResponse
    {
        $request->validated();
        $update = User::findOrFail($id)->update($request->all());
        return match ($update) {
            true => User::find($id),
            false => response()->json(['Message' => "Error Login!!!"], 401),
        };
    }


}

