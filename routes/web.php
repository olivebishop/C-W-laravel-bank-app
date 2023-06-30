<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanController;
use App\Models\Loan;
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

Route::post('/process_signup', [UserController::class, 'store']);
Route::post('/process_login', [LoginController::class, 'login']);

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/login');
});

// Routes using auth middleware //
Route::group(['middleware' => ['auth']], function(){

    //view routes//
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('/dashboard/loans', function () {
        return view('dashboard.loans');
    })->name('dashboard.loans');
    Route::get('/dashboard/edit/{loan}', function (Loan $loan) {
        return view('dashboard.edit', compact('loan'));
    })->name('dashboard.edit');

    //action routes//
    Route::get('/dashboard/profile', [DashboardController::class, 'profile'])->name('dashboard.profile');
    Route::patch('/profile/update', [DashboardController::class, 'update_profile'])->name('profile.update');
    Route::post('/apply_loan', [LoanController::class, 'store'])->middleware('auth')->name('apply_loan');
    Route::get('/dashboard/reports', [LoanController::class, 'loan'])->name('dashboard.reports');
    Route::put('update/loan/{loan}', [LoanController::class, 'update'])->name('loan.update');
    Route::delete('delete/loan/{loan}', [LoanController::class, 'destroy'])->name('loan.delete');
    Route::get('/dashboard/settings', [DashboardController::class, 'settings'])->name('dashboard.settings');
});