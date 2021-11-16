<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;

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
Route::get('/index', function () {
    return redirect("/");
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/article', function () {
    return view('article');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/messages', function () {
    return view('messages');
});

Route::get("/",[HomeController::class,"index"]);
Route::get("/post",[PostController::class,"post"]);
Route::post("/post/create",[PostController::class,"create_post"]);