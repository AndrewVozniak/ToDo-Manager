<?php

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

Route::get('/','App\Http\Controllers\AppController@indexPage')->name('dashboard');

Route::post('/edit/{id}','App\Http\Controllers\AppController@editTask')->name('editTask');
Route::post('/delete/{id}','App\Http\Controllers\AppController@deleteTask')->name('deleteTask');


Route::post('/add/subtask/{task_id}','App\Http\Controllers\AppController@addSubtask')->name('addSubtask');
Route::post('/edit/subtask/{id}','App\Http\Controllers\AppController@editSubtask')->name('editSubtask');
Route::post('/delete/subtask/{id}','App\Http\Controllers\AppController@deleteSubtask')->name('deleteSubtask');