<?php

use App\Http\Controllers\Administrateur\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Administrateur\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Administrateur\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Administrateur\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Administrateur\Auth\NewPasswordController;
use App\Http\Controllers\Administrateur\Auth\PasswordController;
use App\Http\Controllers\Administrateur\Auth\PasswordResetLinkController;
use App\Http\Controllers\Administrateur\Auth\RegisteredUserController;
use App\Http\Controllers\Administrateur\Auth\VerifyEmailController;
use App\Http\Controllers\Administrateur\DashboardController;
use App\Http\Controllers\Administrateur\SocieteController;
use App\Http\Controllers\Administrateur\AdministrateurController;
use App\Http\Controllers\Administrateur\EmployeController;
use App\Http\Controllers\Administrateur\HistoriqueController;
use Illuminate\Support\Facades\Route;

Route::prefix('administrateur')->name('administrateur.')->group(function () {

Route::middleware('guest')->group(function () {
    /*Route::get('register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('register', [RegisteredUserController::class, 'store']);*/
    Route::get('login', [AuthenticatedSessionController::class, 'create'])->name('login');
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
});

Route::middleware('estAdministrateur')->group(function () {
    Route::put('password', [PasswordController::class, 'update'])->name('password.update');
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');   
    Route::get('dashboard', [DashboardController::class, 'create'])->name('dashboard');
    Route::get('societes/new',[SocieteController::class,'create'])->name('societes.new.create');
    Route::post('societes/new/store',[SocieteController::class,'store'])->name('societes.new.store');
    Route::get('societes',[SocieteController::class,'liste'])->name('societes.liste');
    Route::get('societes/edit/{id}',[SocieteController::class,'edit'])->name('societes.edit.create');
    Route::post('societes/edit/{id}/store',[SocieteController::class,'editStore'])->name('societes.edit.store');
    Route::delete('societes/delete/{id}',[SocieteController::class,'delete'])->name('societes.delete');

    Route::get('new',[AdministrateurController::class,'create'])->name('administrateurs.new.create');
    Route::post('new/store',[AdministrateurController::class,'store'])->name('administrateurs.new.store');
    Route::get('administrateurs/liste',[AdministrateurController::class,'liste'])->name('administrateurs.liste');
    Route::get('edit/{id}',[AdministrateurController::class,'edit'])->name('administrateurs.edit.create');
    Route::post('edit/{id}/store',[AdministrateurController::class,'editStore'])->name('administrateurs.edit.store');
    Route::delete('delete/{id}',[AdministrateurController::class,'delete'])->name('administrateurs.delete');

    Route::get('employe/new', [EmployeController::class, 'create'])->name('employes.create');
    Route::post('employe/new/store', [EmployeController::class, 'store'])->name('employes.new.store');
    Route::get('employe/liste', [EmployeController::class, 'liste'])->name('employes.liste');

    Route::post('employe/invite', [EmployeController::class, 'inviterEmploye'])->name('employes.inviter');
    Route::get('employe/invite/cancel/{id}', [EmployeController::class, 'CancelEmployeInvitation'])->name('employes.invitation.cancel');

    Route::get('historique/liste', [HistoriqueController::class, 'liste'])->name('historique.liste');

    
});


});