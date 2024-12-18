<?php

use App\Http\Controllers\CompletedTaskController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(TodoController::class)->group(function () {
        Route::get('/dashboard', 'index')->name('dashboard');
        Route::get('/create', 'create')->name('todo.create');

        Route::post('/store', 'store')->name('todo.store');

        Route::put('/complete', 'complete')->name('todo.complete');
        Route::delete('/destroy', 'destroy')->name('todo.destroy');

        Route::get('/edit/{id}', 'edit')->name('todo.edit');
        Route::put('/update', 'update')->name('todo.update');
    });

    Route::controller(CompletedTaskController::class)->group(function () {
        Route::get('complete', 'index')->name('complete.index');
        Route::put('uncomplete', 'unComplete')->name('uncomplete.index');
    });
});

require __DIR__ . '/auth.php';
