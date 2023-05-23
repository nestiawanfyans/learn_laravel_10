<?php

namespace App\Http\Controllers\api\auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\auth\CheckedSignInRequest;
use App\Http\Resources\auth\SignInResourece;
use App\Models\User;
use http\Env\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use League\OAuth2\Server\ResponseTypes\RedirectResponse;

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
            $user = Auth::user();
            $tokens = $user->createToken('example')->accessToken;
            return SignInResourece::make($user)->additional(['tokens' => $tokens]);
        } else {
            return response()->json(['Message' => "Error Login!!!"], 401);
        }
    }
}
