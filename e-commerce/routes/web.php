<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\userscontroller;

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
// Parameters passing in url
// ss

Route::get('/', function () {

    return view('welcome');
    // return redirect('home');
});

// Route::get('/home', function () {
//     return view('hello');
// });

Route::view('/home','hello');
Route::view('/about','about');
Route::view('/contact','contact');
Route::view('/test','test-qty');
// Route::view('/users','users');
Route::get('/practice',[userscontroller::class,'practice_arr_obj']);


route::GEt('conc/{id}',[userscontroller::class,'show']); // right stmt
Route::get('conc',[userscontroller::class,'show'])->name('conc');
Route::get('/concept',[userscontroller::class,'concept']);   // concept function does not exist.
Route::get('/product',[userscontroller::class,'product']);

Route::get('/test_p',[userscontroller::class,'issue_testing']);
//Route::post('/cart/{id}',[userscontroller::class,'productDisplay'])->name('cart');
Route::post('/cart',[userscontroller::class,'productDisplay']);
// Route::post('/cart',[userscontroller::class,'productDisplay']);
Route::get('/test_array',[userscontroller::class,'test_array']);
Route::get('/issue_testing',[userscontroller::class,'issue_testing']);
