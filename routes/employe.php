<?php

use App\Http\Controllers\Employe\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Employe\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Employe\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Employe\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Employe\Auth\NewPasswordController;
use App\Http\Controllers\Employe\Auth\PasswordController;
use App\Http\Controllers\Employe\Auth\PasswordResetLinkController;
use App\Http\Controllers\Employe\Auth\RegisteredUserController;
use App\Http\Controllers\Employe\Auth\VerifyEmailController;
use App\Http\Controllers\Employe\DashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('employe')->name('employe.')->group(function () {


Route::middleware('guest:employe')->group(function () {
    Route::get('register/{id}', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register/{id}', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('estEmploye')->group(function () {

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
    
    Route::get('dashboard', [DashboardController::class, 'create'])
                ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

   
    
});

});