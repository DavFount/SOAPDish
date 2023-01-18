<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StudiesController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [PagesController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('studies', StudiesController::class);
    Route::get('community', [UsersController::class, 'index'])->name('community.index');
    Route::get('community/{user}', [UsersController::class, 'show'])->name('community.show');
    Route::post('community/{user}/follow', [UsersController::class, 'follow'])->name('community.follow');
    Route::post('community/{user}/unfollow', [UsersController::class, 'unfollow'])->name('community.unfollow');
});

require __DIR__.'/auth.php';
