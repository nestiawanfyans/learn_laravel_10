<?php

namespace App\Http\Controllers\api\users;

use App\Contracts\UsersContracts;
use App\Http\Controllers\Controller;
use App\Http\Requests\user\UpdateUserRequest;
use App\Http\Resources\users\UserResource;
use App\Models\User;
use App\Repository\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class UserController extends Controller
{

    private $user;
    public function __construct(UsersContracts $user)
    {
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): AnonymousResourceCollection
    {
       $data = $this->user->allUser();
        return UserResource::collection($data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id): UserResource
    {
        $data = $this->user->detailUser($id);
        return UserResource::make($data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(string $id, UpdateUserRequest $request, User $user): UserResource
    {
        $data = $this->user->update($id, $request);
        return UserResource::make($data);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
