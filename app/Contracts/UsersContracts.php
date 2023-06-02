<?php

namespace App\Contracts;

use App\Http\Requests\user\UpdateUserRequest;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;

interface UsersContracts {
    public function allUser(): Collection;
    public function detailUser(string $id): User;
    public function update(string $id, UpdateUserRequest $data): User|JsonResponse;
}
