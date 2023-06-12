<?php

namespace App\Http\Controllers\Client\User;

use App\Contracts\UsersContracts;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    protected $user;
    public function __construct(UsersContracts $user)
    {
        $this->user = $user;
    }

    public function viewUser(): View {
        return view("user/index");
    }

    function allUser(): Collection
    {
        return $this->user->allUser();
    }
}
