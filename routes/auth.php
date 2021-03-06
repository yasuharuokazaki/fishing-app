<?php

use App\Models\Result;
use App\Http\Controllers\MapApp;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\DatabaseApp;
use App\Http\Controllers\Auth\SubmitDatas;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Satellite;
use Illuminate\Http\Request;

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
                ->middleware('guest')
                ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
                ->middleware('guest')
                ->name('password.email');

Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
                ->middleware('guest')
                ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
                ->middleware('guest')
                ->name('password.update');

Route::get('/verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->middleware('auth')
                ->name('verification.notice');

Route::get('/verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['auth', 'signed', 'throttle:6,1'])
                ->name('verification.verify');

Route::post('/email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware(['auth', 'throttle:6,1'])
                ->name('verification.send');

Route::get('/confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->middleware('auth')
                ->name('password.confirm');

Route::post('/confirm-password', [ConfirmablePasswordController::class, 'store'])
                ->middleware('auth');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');


Route::post('/fishing_app/submit',[SubmitDatas::class,'submit']
);

Route::get('/database_app',[DatabaseApp::class,'getresults']
)->name('database_app');

Route::delete('/database_app/{id}',[DatabaseApp::class,'delete']
);

Route::get('/database_app/edit/{id}',[DatabaseApp::class,'edit']
);

Route::post('/modify',[DatabaseApp::class,'modify']);

Route::get('/map_app',[MapApp::class,'showmap'])->name('map_app');

Route::get('/map_app/serch',[MapApp::class,'serch']);
    
Route::get('/satellite_app',[Satellite::class,'satellite_view'])->name('satellite_app');

// Route::get('/satellite_app/{ob_date}',function(){
//     echo "get was send!";
// });
// [Satellite::class,'specify']);