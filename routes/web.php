<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriorityViewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrashedPostController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', PriorityViewController::class);

Route::get('posts', function () {
    return view('posts.index');
})->middleware(['auth', 'verified'])->name('posts');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/posts', PostController::class);
    Route::resource('/categories', CategoryController::class);
});

Route::prefix('/posts')->name('posts.')->middleware('auth')->group(function (){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{post}', [PostController::class, 'show'])->name('show')->withTrashed();
    //Route::get('/{post}', [PostController::class, 'edit'])->name('edit')->withTrashed();
    Route::patch('/{post}', [PostController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy')->withTrashed();
});

Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function (){
    Route::get('/', [TrashedPostController::class, 'index'])->name('index');
    Route::get('/{post}', [TrashedPostController::class, 'show'])->name('show')->withTrashed();
    Route::put('/{post}', [TrashedPostController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{post}', [TrashedPostController::class, 'destroy'])->name('destroy')->withTrashed();
});

Route::prefix('/posts/{post}/comments')->name('comments.')->middleware('auth')->group(function(){
    Route::get('/', [CommentController::class, 'index'])->name('index');
    //Route::get('/{post}', [CommentController::class, 'show'])->name('show');
    Route::post('/', [CommentController::class, 'store'])->name('store');
    Route::put('/{post}', [CommentController::class, 'update'])->name('update');
    Route::delete('/{post}', [CommentController::class, 'destroy'])->name('destroy');
});


Route::middleware('auth')->group(function () { // with this route, only admins can access
    Route::resource('/categories', CategoryController::class);
    //Route::resource('/posts', PostController::class);
});

Route::get('/search', SearchController::class);


require __DIR__.'/auth.php';
