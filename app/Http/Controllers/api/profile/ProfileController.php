<?php

namespace App\Http\Controllers\api\profile;

use App\Http\Controllers\Controller;
use App\Http\Resources\profile\ProfileResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ProfileResource|JsonResponse
    {
        if (Auth::guard('api')->check()){
            $profile = Auth::guard('api')->user();
            return ProfileResource::make($profile);
        } else {
            return response()->json(["Message" => "Unauthorized"], 401);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
