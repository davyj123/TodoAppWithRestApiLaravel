<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/todo/add',[TaskController::class,'create']);
Route::post('/todo/status',[TaskController::class,'Update']);
Route::post('/todo/tasks',[TaskController::class, 'getUserTask']);
Route::post('/todo/delete',[TaskController::class, 'DeleteTask']);
