<?php

use App\Http\Controllers\api\v1\CompleteTaskController;
use App\Http\Controllers\api\v1\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

route::prefix("/v1")->group(function () {
    route::patch("/task/{task}/complete", CompleteTaskController::class);

    route::controller(TaskController::class)->group(function () {
        route::get("/task", "index")->name("task.index");
        route::get("/task/{task}", "show")->name("task.show");
        route::post("/task", "store")->name("task.store");
        route::put("task/{task}", "update")->name("task.update");
        route::delete("task/{task}", "destroy")->name("task.delete");
    });
});
