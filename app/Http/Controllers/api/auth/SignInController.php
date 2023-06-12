<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\CheckedSignInRequest;
use App\Http\Resources\auth\SignInResourece;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\OAuth2\Server\ResponseTypes\RedirectResponse;
use Laravel\Sanctum\PersonalAccessTokenResult;

class SignInController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(CheckedSignInRequest $request): SignInResourece|JsonResponse
    {
        // validation json body
        $request->validated();

        if (Auth::attempt($request->all())){
            $user = auth()->user();

            $tokenResult = $user->createToken('myAppToken');
            $accessToken = $tokenResult->accessToken;
//            $tokens = $tokenResult->token;
//            $tokens->expires_at = now()->addWeeks(1);
//            $tokens->save();

            return SignInResourece::make($user)->additional(['tokens' => $accessToken]);
        } else {
            return response()->json(['Message' => "Error Login!!!"], 401);
        }
    }
}
