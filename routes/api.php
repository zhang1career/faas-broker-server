<?php

use App\Http\Middleware\VerifyApiSign;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MerchandiseController;

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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('/merchandises',          [MerchandiseController::class, 'getAll']);
Route::get('/merchandises/{id}',     [MerchandiseController::class, 'getOne']);
Route::post('/merchandises',         [MerchandiseController::class, 'create']);//->middleware(VerifyApiSign::class);
Route::put('/merchandises/{id}',     [MerchandiseController::class, 'update']);
Route::delete('/merchandises/{id}',  [MerchandiseController::class, 'delete']);
