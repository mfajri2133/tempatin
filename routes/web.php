<?php

use App\Http\Controllers\SocialiteController;
use App\Livewire\Auth\Login;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Route;

Route::get('/', Welcome::class);
Route::get('/login', Login::class);

Route::get('/auth/{provider}/redirect', [SocialiteController::class, 'redirectToProvider'])->name('socialite.redirect');
Route::get('/auth/{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])->name('socialite.callback');
