<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\User\PostController;

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

// Route::get('/', function () {
//     return view('user.welcome');
// });

Route::prefix('')->group(function() {
    Route::get('/', [PostsController::class, 'index'])->name('posts.index');
    Route::get('show/{post}', [PostsController::class, 'show'])->name('posts.show');
});

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users'])->name('dashboard');

Route::prefix('user')
->middleware(['auth:users'])
->group(function() {
    Route::get('index', [PostController::class, 'index'])->name('posts.index');
    Route::get('show/{post}', [PostController::class, 'show'])->name('posts.show');
});

require __DIR__.'/auth.php';
