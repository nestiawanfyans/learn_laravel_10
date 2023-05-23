<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\StoreSignUpRequest;
use App\Http\Resources\auth\SignUpResource;
use App\Models\User;
use Illuminate\Http\Request;

class SignUpController extends Controller
{
    public function store(StoreSignUpRequest $request): SignUpResource
    {
        $signUp = User::create($request->validated());

        return SignUpResource::make($signUp);
    }
}
