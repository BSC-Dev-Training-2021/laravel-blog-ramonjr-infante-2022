<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;

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
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/messages', function () {
    return view('messages');
});

Route::get("/",[HomeController::class,"index"]);
Route::get("/post",[PostController::class,"post"]);
Route::post("/post/create",[PostController::class,"create_post"]);
Route::get("/article/{blog_id}",[ArticleController::class,"index"]);
Route::post("/article/insert_comment/{blog_id}",[ArticleController::class,"insert_comment"]);
Route::get("/categories",[CategoryController::class,"index"]);
Route::post("/category/create_catagory",[CategoryController::class,"create_catagory"]);
Route::post("/category/update_category",[CategoryController::class,"update_category"]);
Route::post("/category/delete_category",[CategoryController::class,"delete_category"]);


