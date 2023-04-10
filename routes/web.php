<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CatageriesController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){

// Route::get('/login', [UserController::class, 'index']);
Route::get('/admin', [UserController::class, 'index']);
Route::post('/post_login', 'App\Http\Controllers\UserController@login')->name('postlogin');
// Route::get('/home', [CatageriesController::class, 'index']);
///////////////////////////////////////////////////////////////////////////////////////
Route::get('/dashboard', [CatageriesController::class, 'index']);
Route::get('/catageries/show', [CatageriesController::class, 'show']);
Route::post('/catageries/store', [CatageriesController::class, 'store']);
Route::get('/catageries/add', [CatageriesController::class, 'create']);
Route::get('/catageries/edit/{id}', [CatageriesController::class, 'edit']);
 Route::put('/catageries/update', [CatageriesController::class, 'update']);
Route::get('/catageries/delete/{id}', [CatageriesController::class, 'destroy']);
////////////////////////////////////////////////////////////////////////////////////////
Route::get('/products/create', [ProductsController::class, 'create']);
Route::get('/products/show', [ProductsController::class, 'show']);
Route::post('/products/store', [ProductsController::class, 'store']);
Route::get('/products/show', [ProductsController::class, 'show']);
Route::get('/catageries/{id}', 'App\Http\Controllers\CatageriesController@getproducts');
Route::get('/products/edit/{id}', [ProductsController::class, 'edit']);
Route::put('/products/update', [ProductsController::class, 'update']);
Route::get('/products/delete/{id}', [ProductsController::class, 'destroy']);
///////////////////////////////////////////////////////////////////////////////////////////
Route::get('/', [HomeController::class, 'index']);
Route::get('/home/catageries', [HomeController::class, 'show']);
Route::get('/catageries/show/{id}', [HomeController::class, 'show']);
    });
// Route::get('/catageries', [CatageriesController::class, 'index']);
// Route::get('/catageries/show', [CatageriesController::class, 'show']);
// Route::post('/catageries/store', [CatageriesController::class, 'store']);
//     //Route::post('/catageries/store', [CatageriesController::class, 'store']);
//     // Route::get('/catageries/show', [CatageriesController::class, 'show']);
// Route::get('/catageries/add', [CatageriesController::class, 'create']);
// Route::get('/catageries', [CatageriesController::class, 'index']);
// Route::get('/catageries/edit/{id}', [CatageriesController::class, 'edit']);
//  Route::put('/catageries/update', [CatageriesController::class, 'update']);
// Route::get('/catageries/delete/{id}', [CatageriesController::class, 'destroy']);
//      /////////////////////////////////////////////////////////////
//     // Route::get('/products/{id}', [ProductsController::class, 'index']);
// Route::get('/products/create', [ProductsController::class, 'create']);
// Route::get('/products/show', [ProductsController::class, 'show']);
// Route::post('/products/store', [ProductsController::class, 'store']);
// Route::get('/products/show', [ProductsController::class, 'show']);
// Route::get('/catageries/{id}', 'App\Http\Controllers\CatageriesController@getproducts');
// Route::get('/products/edit/{id}', [ProductsController::class, 'edit']);
// Route::put('/products/update', [ProductsController::class, 'update']);

// Route::get('/', function () {
//     return view('welcome');
// });
