<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;

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
    $blogs = Blog::published()->get();
    return view('welcome', ['blogs' => $blogs]);
})->name('home');

Route::get('/post/{slug}', function ($slug) {
    $blog = Blog::where("slug", $slug)->first();

    if (!Session::get($blog->id . '_read')) {
        $blog->increment('views');
        Session::put($blog->id . '_read', true);
    }
    return view('single_blog_post', ['blog' => $blog]);
})->name('single_blog_post');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::post('blog/{blog}/publish', [BlogController::class, 'publish'])->name('blog.publish');
Route::post('blog/{blog}/unpublish', [BlogController::class, 'unpublish'])->name('blog.unpublish');

Route::middleware(['auth:sanctum', 'verified'])->resource('blog', BlogController::class);
