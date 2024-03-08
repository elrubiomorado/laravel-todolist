<?php

use App\Http\Controllers\TaskController;
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

Route::get("/", [TaskController::class, "index"])->name("task.index");
Route::post("/task/store", [TaskController::class, "store"])->name("task.store");
Route::get("/task/edit/{task}", [TaskController::class, "edit"])->name("task.edit");
Route::put("/task/update/{task}", [TaskController::class, "update"])->name("task.update");
Route::delete("/task/delete/{task}", [TaskController::class, "delete"])->name("task.delete");