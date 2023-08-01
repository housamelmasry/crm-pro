<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProposalController;

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

// company routes
Route::post('/company/create', [CompanyController::class,'store']);
Route::put('/company/update/{id}', [CompanyController::class,'edit']);
Route::delete('/company/delete/{id}', [CompanyController::class,'destroy']);
Route::get('/company/{id}', [CompanyController::class,'show']);
Route::get('/company', [CompanyController::class,'index']);

//meeting routes
Route::post('/meeting/create', [MeetingController::class,'store']);
Route::put('/meeting/update/{id}', [MeetingController::class,'update']);
Route::delete('/meeting/delete/{id}', [MeetingController::class,'destroy']);
Route::get('/meeting/{id}', [MeetingController::class,'index']);

//order routes
Route::post('/order/create', [OrderController::class,'store']);
Route::put('/order/update/{id}', [OrderController::class,'update']);
Route::delete('/order/delete/{id}', [OrderController::class,'destroy']);
Route::get('/order/{id}', [OrderController::class,'index']);

//product routes
Route::post('/product/create', [ProductController::class,'store']);
Route::put('/product/update/{id}', [ProductController::class,'update']);
Route::delete('/product/delete/{id}', [ProductController::class,'destroy']);
Route::get('/product/{id}', [ProductController::class,'index']);

//project routes
Route::post('/Project/create', [ProjectController::class,'store']);
Route::put('/Project/update/{id}', [ProjectController::class,'update']);
Route::delete('/Project/delete/{id}', [ProjectController::class,'destroy']);
Route::get('/Project/{id}', [ProjectController::class,'index']);

//proposal routes
Route::post('/proposal/create', [ProposalController::class,'store']);
Route::put('/proposal/update/{id}', [ProposalController::class,'update']);
Route::delete('/proposal/delete/{id}', [ProposalController::class,'destroy']);
Route::get('/proposal/{id}', [ProposalController::class,'index']);

//client routes
Route::post('/client/create', [ClientController::class,'store']);
Route::put('/client/update/{id}', [ClientController::class,'update']);
Route::delete('/client/delete/{id}', [ClientController::class,'destroy']);
Route::get('/client/{id}', [ClientController::class,'index']);
