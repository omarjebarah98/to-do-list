<?php

use Illuminate\Support\Facades\Route;
use App\HTTP\Controllers\TaskController;
use App\HTTP\Controllers\UserController;
use App\Http\Livewire\ManageUsers;

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

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
});


Route::middleware(['auth'])->group(function () {
    Route::prefix('tasks')->group(function () {
        Route::get('/', [TaskController::class, 'index'])->name('tasks.index');
        Route::post('/', [TaskController::class, 'store'])->name('task.store');
        Route::get('/create', [TaskController::class, 'create'])->name('task.create');
        Route::get('/show/{id}', [TaskController::class, 'show']);
        Route::put('{id}', [TaskController::class, 'update'])->name('task.update');
        Route::delete('{id}', [TaskController::class, 'destroy'])->name('task.delete');
    });

    Route::get('/users', [UserController::class, 'index'])
    ->middleware('admin')
    ->name('users.index');
});


