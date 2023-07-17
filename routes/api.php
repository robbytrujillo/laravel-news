<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//     return $request->user();
// });

Route::prefix('admin')->group(function () {

    //route login
    Route::post('/login',[App\Http\Controllers\Api\Admin\LoginController::class,'index']);
    
    //group route with middleware "auth"
    Route::group(['middleware'=>'auth:api'], function() {

        //data user
        Route::get('/user',[App\Http\Controllers\Api\Admin\LoginController::class,'getUser']);
        
        //refresh token JWT
        Route::get('/refresh',[App\Http\Controllers\Api\Admin\LoginController::class,'refreshToken']);
        
        //logout
        Route::post('/logout',[App\Http\Controllers\Api\Admin\LoginController::class,'logout']);
    });
    //Category
    Route::apiResource('/categories',App\Http\Controllers\Api\Admin\CategoryController::class);
    //Post
    Route::apiResource('/posts', App\Http\Controllers\Api\Admin\PostController::class);
    //Users
    Route::apiResource('/users', App\Http\Controllers\Api\Admin\UserController::class);
});