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
Route::auth();
Route::get('auth/confirm/{token}', 'Auth\AuthController@getConfirm');
Route::get('auth/resend', 'Auth\AuthController@getResend');
///////////////////////////////////////////////////////////////////////////


Route::get('/produtos', 'ProdutoController@listaProdutos')->middleware('auth');
Route::group(['middleware' => ['web']], function () {
    Route::get('/', function () { return view('welcome'); });    

    Route::group(['middleware' => ['auth']], function () { 
        
        Route::group(['middleware' => ['admin']], function () { 
            Route::get('/admin', 'HomeController@admin');        
        });

        Route::group(['middleware' => ['user']], function () { 
            Route::get('/user', 'HomeController@user');        
        });

    });

    //Auth::routes();
});


