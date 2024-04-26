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
// Route::view('/users','users');

route::GEt('conc/{id}',[userscontroller::class,'show']); // right stmt
Route::get('conc',[userscontroller::class,'show']);
Route::get('/concept',[userscontroller::class,'concept']);

Route::get('/users',[userscontroller::class,'product']);
Route::post('/cart',[userscontroller::class,'productDisplay']);

   