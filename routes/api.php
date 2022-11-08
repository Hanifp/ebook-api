<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\heloController;
use App\http\Controllers\AuthController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//public route
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::get('/books', [BookController::class, 'index']);
Route::get('/Books/{id}', [BookController::class, 'show']);
Route::get('/Authors', [AuthorController::class, 'index']);
Route::get('/Authors/{id}', [AuthorController::class, 'show']);

//protected
Route::middleware('auth:sanctum')->group(function () {
    Route::resource('books', BookController::class)->except('create', 'edit', 'show', 'index');
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::resource('authors', AuthorController::class)->except('create', 'edit', 'show', 'index');
});
