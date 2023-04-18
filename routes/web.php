<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DraftController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriorityViewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\TrashedPostController;
use Illuminate\Http\Request;
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

// Returns index upon authentication
Route::get('/posts', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('posts');

    /*  ------- INVOKABLE CONTROLLERS       */
// Controls the view of images on the landign page
Route::get('/', PriorityViewController::class);

// Controls the search action
Route::get('/search', SearchController::class);

// Controls the draft view for unpublished posts
Route::get('/posts/drafts', DraftController::class);

    /*----------------------------------- */

Route::resource('/posts', PostController::class);
Route::resource('/categories', CategoryController::class);
Route::resource('/admin', AdminController::class);
//Route::delete('/admin', [CommentController::class, 'destroy'])->name('destroy');

 // Only authenticated and email verified users can go here
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('/admin')->name('admin.')->middleware('can:is_admin')->group(function (){
    Route::get('/', [AdminController::class, 'index'])->name('index')->withTrashed();
});

Route::prefix('/posts')->name('posts.')->middleware(['auth','verified'])->group(function (){
    Route::get('/', [PostController::class, 'index'])->name('index');
    Route::get('/{post}', [PostController::class, 'show'])->name('show')->withTrashed();
    Route::patch('/{post}', [PostController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy')->withTrashed();
});

Route::prefix('/posts/{post}/comments')->name('comments.')->middleware('auth')->group(function(){
    Route::post('/', [CommentController::class, 'store'])->name('store');
    Route::delete('/', [CommentController::class, 'destroy'])->name('destroy');
});

Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function (){
    Route::get('/', [TrashedPostController::class, 'index'])->name('index');
    Route::get('/{post}', [TrashedPostController::class, 'show'])->name('show')->withTrashed();
    Route::put('/{post}', [TrashedPostController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{post}', [TrashedPostController::class, 'destroy'])->name('destroy')->withTrashed();
});

Route::prefix('/categories')->name('categories.')->middleware('auth')->group(function (){
    Route::get('/', [CategoryController::class, 'index'])->name('index');
    Route::patch('/{category}', [CategoryController::class, 'update'])->name('update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('destroy');
});

Route::post('/dark-mode', function (Request $request) {
    $darkMode = $request->input('dark-mode');
    if ($darkMode === 'on') {
        return response('Dark mode enabled')->cookie('dark-mode', 'on', 60*24*7);
    } else {
        return response('Dark mode disabled')->cookie('dark-mode', 'off', 60*24*7);
    }
})->name('dark-mode');

require __DIR__.'/auth.php';
