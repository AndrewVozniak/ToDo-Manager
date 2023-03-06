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

// API FEATURES
Route::get('/tasks/get/{user_id}','App\Http\Controllers\API\TaskController@getTasks');
Route::get('/task/get/{task_id}','App\Http\Controllers\API\TaskController@getTaskByID');
Route::post('/task/create','App\Http\Controllers\API\TaskController@createTask');
Route::put('/task/update/{task_id}','App\Http\Controllers\API\TaskController@updateTask');
Route::delete('/task/delete/{task_id}','App\Http\Controllers\API\TaskController@deleteTask');


Route::get('/subtasks/get/{task_id}','App\Http\Controllers\API\SubtaskController@getSubtasksByTaskID');
Route::get('/subtask/get/{subtask_id}','App\Http\Controllers\API\SubtaskController@getSubtaskByID');
Route::post('/subtask/create/','App\Http\Controllers\API\SubtaskController@createSubtask');
Route::put('/subtask/update/{task_id}','App\Http\Controllers\API\SubtaskController@updateSubtask');
Route::delete('/subtask/delete/{task_id}','App\Http\Controllers\API\SubtaskController@deleteSubtask');