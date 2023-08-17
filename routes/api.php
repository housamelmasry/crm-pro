<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\MeetingController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ProposalController;
use App\Models\Category;

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


Route::post('/register', [AuthController::class , 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {



    return $request->user();
});

// company routes
Route::get('/company/index', [CompanyController::class,'index']);
Route::get('/company/{id}', [CompanyController::class,'show']);
Route::post('/company/create', [CompanyController::class,'store']);
Route::put('/company/update/{id}', [CompanyController::class,'edit']);
Route::delete('/company/delete/{id}', [CompanyController::class,'destroy']);


//category routes
// Route::resource('/category', CategoryController::class);
Route::get('/category/index', [CategoryController::class,'index']);
Route::get('/category/{id}', [CategoryController::class,'show']);
Route::post('/category/create', [CategoryController::class,'create']);
Route::put('/category/update/{id}', [CategoryController::class,'update']);
Route::delete('/category/delete/{id}', [CategoryController::class,'destroy']);


//client routes
Route::get('/client/index', [ClientController::class,'index']);
Route::get('/client/{id}', [ClientController::class,'show']);
Route::post('/client/create' ,[ClientController::class,'create']);
Route::put('/client/update/{id}', [ClientController::class,'update']);
Route::delete('/client/delete/{id}', [ClientController::class,'destroy']);

//meeting routes
Route::get('/meeting/index', [MeetingController::class,'index']);
Route::get('/meeting/{id}', [MeetingController::class,'show']);
Route::post('/meeting/create', [MeetingController::class,'create']);
Route::put('/meeting/update/{id}', [MeetingController::class,'update']);
Route::delete('/meeting/delete/{id}', [MeetingController::class,'destroy']);

//order routes
Route::get('/order/index', [OrderController::class,'index']);
Route::get('/order/{id}', [OrderController::class,'show']);
Route::post('/order/create', [OrderController::class,'store']);
Route::put('/order/update/{id}', [OrderController::class,'update']);
Route::delete('/order/delete/{id}', [OrderController::class,'destroy']);

//product routes
Route::get('/product/index', [ProductController::class,'index']);
Route::get('/product/{id}', [ProductController::class,'show']);
Route::post('/product/create', [ProductController::class,'create']);
Route::put('/product/update/{id}', [ProductController::class,'update']);
Route::delete('/product/delete/{id}', [ProductController::class,'destroy']);

//project routes
Route::get('/project/index', [ProjectController::class,'index']);
Route::get('/project/{id}', [ProjectController::class,'show']);
Route::post('/project/create', [ProjectController::class,'create']);
Route::put('/project/update/{id}', [ProjectController::class,'update']);
Route::delete('/project/delete/{id}', [ProjectController::class,'destroy']);

//proposal routes
Route::get('/proposal/index', [ProposalController::class,'index']);
Route::get('/proposal/{id}', [ProposalController::class,'show']);
Route::post('/proposal/create', [ProposalController::class,'create']);
Route::put('/proposal/update/{id}', [ProposalController::class,'update']);
Route::delete('/proposal/delete/{id}', [ProposalController::class,'destroy']);


