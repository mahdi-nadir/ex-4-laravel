<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Question4Controller;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/question-1', function () {
        return view('questions.1');
    })->name('question.1');

    Route::get('/question-4', [Question4Controller::class, 'create'])->name('question.4.create');
    Route::post('/question-4', [Question4Controller::class, 'store'])->name('question.4.store');
});

require __DIR__.'/auth.php';
