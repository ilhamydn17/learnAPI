<?php

use App\Http\Controllers\Api\ApiAuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuoteController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\PersonApiController;

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

// INI ADALAH CARA YANG KURANG BENAR UNTUK MEMBUAT ROUTE API
Route::get('/hello', function () {
    // dalam membuat API yang pertama harus ditentukan adalah http verbs yang digunakan untuk melakuan request
    // pada function ini request yang diminta dengan menggunakan method get
    // mengembalikan response dari request yang diminta
    // response yang digunakan harus berbentuk aray, objek, atau json
    $dataResponse = [
        'message' => 'Hello Ilham Yudantyo',
        'kabar' => 'Alhamdulillah baik'
    ];
    return response($dataResponse);
    // funciton response adalah function bawaan dari laravel yang digunakan untuk mengembalikan response dari request yang diminta
});

// DIBAWAH INI ADLAAH BEST PRACTICE UNTUK MEMBUAT ROUTE API
Route::apiResource('/quote', QuoteController::class);
Route::apiResource('/users', UserController::class);
Route::apiResource('/person', PersonApiController::class);

//  Route with authentication
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('/quote', QuoteController::class);
    Route::post('/logout', [ApiAuthController::class, 'logout']);
});

Route::post('/register', [ApiAuthController::class, 'register']);
Route::post('/login', [ApiAuthController::class, 'login']);
