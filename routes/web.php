<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\TaskManager;

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
Route::middleware("auth")->group( function(){
Route::get('/',[TaskManager::class, "getAll"])->name("home");
});
Route::get("login", [AuthManager::class, "login"])->name("login");

Route::post("login", [AuthManager::class, "loginPost"])->name("login.post");

Route::get("register", [AuthManager::class, "register"])->name("register");

Route::post("register", [AuthManager::class, "registerPost"])->name("register.post");
/*
Route::group([
    'middleware' => 'auth',
    'prefix' => 'tasks'
], function () {
  */
Route::middleware("auth")->prefix("tasks")->name("tasks.")->group( function(){
    Route::get("/", [TaskManager::class, "create"])->name("create");

    Route::post("create", [TaskManager::class, "createPost"])->name("create.post");

    Route::post("status", [TaskManager::class, "taskUpdateStatus"])->name("update.status");

    Route::post("delete", [TaskManager::class, "taskDelete"])->name("delete");
});