<?php

use App\Http\Controllers\Api\TaskController;
use App\Http\Controllers\Api\TechnologieController;
use App\Http\Controllers\Api\TechnologieProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\ProjectController;
use App\Http\Controllers\RoleController;

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

Route::get('/user', [AuthController::class, 'me'])->middleware('auth:sanctum');
Route::get('/users',[AuthController::class,'index'] );
Route::put('/users/{id}/update',[AuthController::class,'update'] );
Route::delete('/users/{id}/delete',[AuthController::class,'destroy'] );
Route::get('/users/{id}/edit',[AuthController::class,'edit'] );
Route::post('/register',[AuthController::class,'register'] );


Route::get('/projets',[ProjectController::class,'index'] );
Route::post('/projets',[ProjectController::class,'store'] );
Route::get('/projets/{id}',[ProjectController::class,'show'] );
Route::get('/projets/{id}/edit',[ProjectController::class,'edit'] );
Route::put('/projets/{id}/update',[ProjectController::class,'update'] );
Route::delete('/projets/{id}/delete',[ProjectController::class,'destroy'] );

Route::get('/tasks',[TaskController::class,'index'] );
Route::post('/tasks',[TaskController::class,'store'] );
Route::get('/tasks/{id}',[TaskController::class,'show'] );
Route::get('/tasks/{id}/edit',[TaskController::class,'edit'] );
Route::put('/tasks/{id}/update',[TaskController::class,'update'] );
Route::delete('/tasks/{id}/delete',[TaskController::class,'destroy'] );

Route::get('/technologies',[TechnologieController::class,'index'] );
Route::post('/technologies',[TechnologieController::class,'store'] );
Route::get('/technologies/{id}',[TechnologieController::class,'show'] );
Route::get('/technologies/{id}/edit',[TechnologieController::class,'edit'] );
Route::put('/technologies/{id}/update',[TechnologieController::class,'update'] );
Route::delete('/technologies/{id}/delete',[TechnologieController::class,'destroy'] );


Route::get('/roles',[RoleController::class,'index'] );


Route::post('/login',[AuthController::class,'login'] );
Route::post('/logout',[AuthController::class,'logout'] );
