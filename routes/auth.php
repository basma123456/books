<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Borrower\Auth\RegisterdUserController as BorrowerRegisterdUserController;
use App\Http\Controllers\Borrower\Auth\AuthenticatedSessionController as BorrowerAuthenticatedSessionController;
use App\Http\Controllers\Borrower\Auth\ConfirmablePasswordController as BorrowerConfirmablePasswordController;
use App\Http\Controllers\Borrower\Auth\EmailVerificationNotificationController as BorrowerEmailVerificationNotificationController;
use App\Http\Controllers\Borrower\Auth\EmailVerificationPromptController as BorrowerEmailVerificationPromptController;
use App\Http\Controllers\Borrower\Auth\NewPasswordController as BorrowerNewPasswordController;
use App\Http\Controllers\Borrower\Auth\PasswordController as BorrowerPasswordController;
use App\Http\Controllers\Borrower\Auth\PasswordResetLinkController as BorrowerPasswordResetLinkController;
use App\Http\Controllers\Borrower\Auth\RegisteredUserController as BorrowerRegisteredUserController;
use App\Http\Controllers\Borrower\Auth\VerifyEmailController as BorrowerVerifyEmailController;

use Illuminate\Support\Facades\Route;

Route::middleware('guest:web')->prefix('admin')->group(function () {
    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');

    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.store');
});

Route::middleware('auth')->prefix('admin')->group(function () {
    Route::get('verify-email', EmailVerificationPromptController::class)
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', VerifyEmailController::class)
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::put('password', [PasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');
});



///************************for borrowers************************/
///


Route::middleware('guest:borrower')->as('borrower.')->prefix('borrower')->group(function () {
    Route::get('register', [BorrowerRegisterdUserController::class, 'create'])
        ->name('register');

    Route::post('register', [BorrowerRegisterdUserController::class, 'store']);

    Route::get('login', [BorrowerAuthenticatedSessionController::class, 'create'])
        ->name('login');

    Route::post('login', [BorrowerAuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [BorrowerPasswordResetLinkController::class, 'create'])
        ->name('password.request');

    Route::post('forgot-password', [BorrowerPasswordResetLinkController::class, 'store'])
        ->name('password.email');

    Route::get('reset-password/{token}', [BorrowerNewPasswordController::class, 'create'])
        ->name('password.reset');

    Route::post('reset-password', [BorrowerNewPasswordController::class, 'store'])
        ->name('password.store');
});

Route::middleware('borrower')->as('borrower.')->prefix('borrower')->group(function () {
    Route::get('verify-email', BorrowerEmailVerificationPromptController::class)
        ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', BorrowerVerifyEmailController::class)
        ->middleware(['signed', 'throttle:6,1'])
        ->name('verification.verify');

    Route::post('email/verification-notification', [BorrowerEmailVerificationNotificationController::class, 'store'])
        ->middleware('throttle:6,1')
        ->name('verification.send');

    Route::get('confirm-password', [BorrowerConfirmablePasswordController::class, 'show'])
        ->name('password.confirm');

    Route::post('confirm-password', [BorrowerConfirmablePasswordController::class, 'store']);

    Route::put('password', [BorrowerPasswordController::class, 'update'])->name('password.update');

    Route::post('logout', [BorrowerAuthenticatedSessionController::class, 'destroy'])
        ->name('logout');
});
