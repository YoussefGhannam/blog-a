<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;


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

Route::get('/',[PostController::class,'index'])->name('posts.index');

Route::get('/search', [PostController::class,'search'])->name('post.search');


Route::middleware(['auth'])->group(function () {
    Route::get('/posts/create',[PostController::class,'create'])->name('posts.create');
    Route::post('/posts/store',[PostController::class,'store'])->name('posts.store');
    Route::get('/posts/{title:slug}/edit',[PostController::class,'edit'])->name('posts.edit');
    Route::put('/posts/{id}',[PostController::class,'update'])->name('posts.update');
    Route::delete('/posts/{id}',[PostController::class,'delete'])->name('posts.delete');
});

Route::get('/posts/{title:slug}',[PostController::class,'show'])->name('posts.show');




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

 Route::fallback(function () {
     return "Not Found";
});
require __DIR__.'/auth.php';
