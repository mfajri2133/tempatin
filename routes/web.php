<?php

use App\Http\Controllers\SocialiteController;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\SetProfile;
use App\Livewire\Dashboard;
use App\Livewire\Dashboard\Profile as DashboardProfile;
use App\Livewire\Dashboard\Venues\VenueEdit;
use App\Livewire\Dashboard\Venues\VenueCreate;
use App\Livewire\Dashboard\Venues\VenueDetail;
use App\Livewire\Dashboard\Venues\Venues;
use App\Livewire\Dashboard\Users;
use App\Livewire\Dashboard\Admin;
use App\Livewire\Dashboard\Categories;
use App\Livewire\Dashboard\Transactions\TransactionDetail;
use App\Livewire\Dashboard\Transactions\Transactions;
use App\Livewire\User\About;
use App\Livewire\User\Histories\TransactionHistories;
use App\Livewire\User\Histories\TransactionHistoryDetail;
use App\Livewire\User\Profile as UserProfile;
use App\Livewire\User\Venues\VenueDetail as UserVenueDetail;
use App\Livewire\User\Venues\Venues as UserVenues;
use App\Livewire\Welcome;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Public Route
Route::get('/', Welcome::class)->name('welcome');
Route::get('/about', About::class)->name('about');
Route::prefix('venues')->name('venues.')->group(function () {
    Route::get('/', UserVenues::class)->name('index');
    Route::get('/{venue}/detail', UserVenueDetail::class)->name('show');
});

// Auth
Route::middleware('guest')->group(function () {
    Route::get('/login', Login::class)->name('login');
    Route::get('/register', Register::class)->name('register');
});

// Socialite
Route::prefix('auth')->name('socialite.')->group(function () {
    Route::get('{provider}/redirect', [SocialiteController::class, 'redirectToProvider'])
        ->name('redirect');

    Route::get('{provider}/callback', [SocialiteController::class, 'handleProviderCallback'])
        ->name('callback');
});

// Auth User (Admin + User)
Route::middleware(['auth', 'force.profile'])->group(function () {
    Route::get('/profile', UserProfile::class)->name('user.profile');
    Route::get('/set-profile', SetProfile::class)->name('profile.setup');

    Route::prefix('transaction-histories')->name('transaction-histories.')->group(function () {
        Route::get('/', TransactionHistories::class)->name('index');
        Route::get('/{id}/detail', TransactionHistoryDetail::class)->name('show');
    });

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    })->name('logout');
});

// Dashboard (Admin Only)
Route::prefix('dashboard')->name('dashboard.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', Dashboard::class)->name('index');
    Route::get('/profile', DashboardProfile::class)->name('profile');

    Route::get('/users', Users::class)->name('users');
    Route::get('/admin-users', Admin::class)->name('admin-users');
    Route::get('/categories', Categories::class)->name('categories');

    Route::prefix('transactions')->name('transactions.')->group(function () {
        Route::get('/', Transactions::class)->name('index');
        Route::get('/{transaction}/detail', TransactionDetail::class)->name('show');
    });

    Route::prefix('venues')->name('venues.')->group(function () {
        Route::get('/', Venues::class)->name('index');
        Route::get('/create', VenueCreate::class)->name('create');
        Route::get('/{venue}/edit', VenueEdit::class)->name('edit');
        Route::get('/{venue}/detail', VenueDetail::class)->name('show');
    });
});
