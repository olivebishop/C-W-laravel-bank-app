<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});
Route::get('/contacts', function () {
    return view('contacts');
});
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::post('/process_signup', [UserController::class, 'store']);
Route::post('/process_login', [LoginController::class, 'login']);

Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->middleware('auth')->name('dashboard.profile');
Route::get('/dashboard/loans', [DashboardController::class, 'loans'])->middleware('auth')->name('dashboard.loans');
Route::get('/dashboard/reports', [DashboardController::class, 'reports'])->middleware('auth')->name('dashboard.reports');
Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->middleware('auth')->name('dashboard.settings');
Route::patch('/profile/update', [DashboardController::class, 'update_profile'])->middleware('auth')->name('profile.update');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

