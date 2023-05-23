<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\CheckedSignInRequest;
use App\Http\Resources\auth\SignInResourece;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CheckedSignInRequest $request)
    {
        // validation json body
        $request->validated();

        if (Auth::attempt($request->all())){
            $user = Auth::user();
            $tokens = $user->createToken('example')->accessToken;
            return SignInResourece::make($user)->additional(['tokens' => $tokens]);
        } else {
            return response()->json(['Message' => "Error Login!!!"], 401);
        }
    }
}
