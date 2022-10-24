<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\heloController;
use App\http\Controllers\SiswaController;
use App\http\Controllers\BookController;

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
    // return $request->user();
// });

/*
Task
URL : http://localhost/api/halo
METHOD : GET
Exec: function
Return: JSON => ("me": "hanif")
*/

Route::get('halo', function(){
    return["me" => "hanif"];
});

Route::resource('heloController', heloController::class);
Route::resource('/siswa', SiswaController::class);
Route::resource('/book', BookController::class);