<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect('/login');
});
Route::get('/login', function () {
    return view('customer.login');
});
Route::get('/admin', function () {
    return view('user.login');
});
Route::get('/auth', function () {
    return view('customer.auth');
});
Route::get('/register',function(){
    return view('customer.register');
});
// Route::get('/main',function(){
//     return view('main');
// });
Route::get('/books', 'App\Http\Controllers\BookController@getBooks');
Route::get('/books/{id}', 'App\Http\Controllers\BookController@getInfoById');
Route::post('/books/order', 'App\Http\Controllers\BookController@orderBook');
Route::get('/book/add', 'App\Http\Controllers\BookController@getAddBook');
Route::post('/book/add', 'App\Http\Controllers\BookController@addBook');


Route::post('/register', 'App\Http\Controllers\CustomerController@addCustomer');
Route::post('/login', 'App\Http\Controllers\CustomerController@login');
Route::post('/authCheck', 'App\Http\Controllers\CustomerController@authCheck');
Route::post('/transaction', 'App\Http\Controllers\CustomerController@getTransactionScreen');
Route::get('/history', 'App\Http\Controllers\CustomerController@getHistory');
Route::get('/profile', 'App\Http\Controllers\CustomerController@getProfile');
Route::get('/logout', 'App\Http\Controllers\CustomerController@logout');


Route::post('/admin', 'App\Http\Controllers\UserController@login');
Route::get('/admin/history', 'App\Http\Controllers\UserController@getHistory');
Route::get('/admin/books', 'App\Http\Controllers\UserController@getBooks');