<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\ParticipantsController;
use App\Http\Controllers\ProfileController;
use App\Models\Participants;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/', [GuestController::class, 'index'])->name('guest.home');
    Route::get('/participant/{indexgender?}/{gender?}', [ParticipantsController::class, 'create'])->name('participant.create');
    Route::post('/participant/store/{gender}', [ParticipantsController::class, 'store'])->name('participant.store');
});

Route::get('/guest/barcode', function(){
    return view('guest.guest-profile');
});
Route::get('/guest-full', function () {
    return view('guest.guest-full');
})->name('guest-full');
Route::get('/guest-success/{id}',[ParticipantsController::class, 'guess_success'])->name('guest-success');
Route::get('/guest-index', function () {
    return view('layouts.guest-index');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [ParticipantsController::class, 'index'])->name('dashboard');
    Route::get('/dashboard/{nama}', [ParticipantsController::class, 'searchNama']);
    Route::get('/barcode-check', [ParticipantsController::class, 'barcode']);
    Route::get('/barcode-check/{barcode}', [ParticipantsController::class, 'barcode_check']);
    Route::post('/barcode/check-in', [ParticipantsController::class, 'check_in']);
    Route::get('/participant/{id}/edit', [ParticipantsController::class, 'edit'])->name('participant.edit');
});

require __DIR__ . '/auth.php';
