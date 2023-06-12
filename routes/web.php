<?php

use App\Http\Controllers\Client\User\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name("welcome");

route::middleware("auth")->group(function () {
    route::controller(UserController::class)->group(function (){
        route::get("/users", "viewUser")->name("client.users");
    });
});

route::get('/login', function (){
    return "is Login";
})->name("login.user");
