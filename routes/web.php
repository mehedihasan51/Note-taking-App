<?php

use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
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

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/', [NoteController::class,'login'])->name('login');

Route::get('/dashboard', function () {

    $title = "Deshboard";
    return view('dashboard',compact('title'));
})->middleware(['auth', 'verified'])->name('dashboard');

// Route::get('/home', [NoteController::class,'home']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('notes', NoteController::class)->middleware(['auth','verified']);

Route::post('/notes/{id}', [NoteController::class,'destroy'])->name('notes.destroy')->middleware(['auth','verified']);

require __DIR__.'/auth.php';
