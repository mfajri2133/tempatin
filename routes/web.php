<?php

use App\Http\Controllers\SocialiteController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\SetPassword;
use App\Livewire\Dashboard;
use App\Livewire\Dashboard\Users;
use App\Livewire\Dashboard\Venues;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class)->name('welcome');
Route::get('/login', Login::class)->name('login');
Route::get('/register', Register::class)->name('register');

Route::prefix('auth')->group(function () {
    Route::get('{provider}/redirect', [SocialiteController::class, 'redirectToProvider'])->name('socialite.redirect');
    Route::get('{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])->name('socialite.callback');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
    Route::get('/users', Users::class)->name('users');
    Route::get('/venues', Venues::class)->name('venues');
    Route::get('/set-password', SetPassword::class)->name('password.setup');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
});
