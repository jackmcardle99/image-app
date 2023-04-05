<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PriorityViewController;
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
    Route::put('/{post}', [PostController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{post}', [PostController::class, 'destroy'])->name('destroy')->withTrashed();
});

Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function (){
    Route::get('/', [TrashedPostController::class, 'index'])->name('index');
    Route::get('/{post}', [TrashedPostController::class, 'show'])->name('show')->withTrashed();
    Route::put('/{post}', [TrashedPostController::class, 'update'])->name('update')->withTrashed();
    Route::delete('/{post}', [TrashedPostController::class, 'destroy'])->name('destroy')->withTrashed();
});

//Route::post('/posts/create', [PostController::class, 'store'])->name('store');


require __DIR__.'/auth.php';
