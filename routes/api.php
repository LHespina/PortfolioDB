<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
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
Route::apiResource('questions', QuestionController::class);

Route::get('/api/questions/{id}', 'QuestionController@show');
Route::put('/api/questions/{id}', 'QuestionController@update');
Route::delete('/api/questions/{id}', 'QuestionController@destroy');