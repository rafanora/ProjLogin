<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Reset Password
Route::auth();
Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');
Route::post('auth/resend', 'Auth\AuthController@getResend');

//Middleware
Route::get('/produtos', 'ProdutoController@listaProdutos')->middleware('auth');
Route::group(['middleware' => ['web']], function () {
    Route::get('/welcome', function () { return view('welcome'); });
    Route::get('/', function () { return view('home'); });    

    Route::group(['middleware' => ['auth']], function () { 
        
        Route::group(['middleware' => ['admin']], function () { 
            Route::get('/admin', 'HomeController@admin');        
        });

        Route::group(['middleware' => ['user']], function () { 
            Route::get('/user', 'HomeController@user');        
        });

    });
});