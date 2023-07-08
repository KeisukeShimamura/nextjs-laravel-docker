<?php

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

Route::middleware(['middleware' => 'api'])->group(function () {
    # 職種
    Route::post('/job_categories/create', 'App\Http\Controllers\JobCategoryController@create');
    Route::get('/job_categories', 'App\Http\Controllers\JobCategoryController@index');
    Route::get('/job_categories/{id}', 'App\Http\Controllers\JobCategoryController@show');
    Route::patch('/job_categories/update/{id}' , 'App\Http\Controllers\JobCategoryController@update');
    Route::delete('/job_categories/{id}', 'App\Http\Controllers\JobCategoryController@delete');
});
