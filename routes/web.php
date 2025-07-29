<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('homepage');
Route::get('/detail/{id}', [App\Http\Controllers\FrontendController::class, 'detail'])->name('detailpage');
Route::get('/cart', [App\Http\Controllers\FrontendController::class, 'cart'])->name('cartpage');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth', 'role:owner']], function () { // 'role:owner'
    Route::resource('categories', App\Http\Controllers\CategoryController::class);
    Route::resource('authors', App\Http\Controllers\AuthorController::class);
    Route::resource('books', App\Http\Controllers\BookController::class);
});