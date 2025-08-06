<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->controller(AuthController::class)->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('show.login');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('show.register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->controller(CompanyController::class)->group(function () {
    Route::get('/companies', 'index')->name('companies.index');
    Route::get('/companies/create', 'create')->name('companies.create');
    Route::get('/companies/edit/{company}', 'edit')->name('companies.edit');
    Route::get('/companies/{company}', 'show')->name('companies.show');
    Route::post('/companies', 'store')->name('companies.store');
    Route::post('/companies/update/{company}', 'update')->name('companies.update');
    Route::delete('/companies/{company}', 'destroy')->name('companies.destroy');
});

Route::middleware('auth')->controller(JobController::class)->group(function () {
    Route::get('/jobs/create', 'create')->name('jobs.create');
    Route::get('/jobs/edit/{job}', 'edit')->name('jobs.edit');
    Route::post('/jobs', 'store')->name('jobs.store');
    Route::post('/jobs/update/{job}', 'update')->name('jobs.update');
    Route::delete('/jobs/{job}', 'destroy')->name('jobs.destroy');
});

Route::get('/jobs/search', [JobController::class, 'search'])->name('jobs.search');
Route::get('/jobs/{job}', [JobController::class, 'show'])->name('jobs.show');
Route::get('/', [JobController::class, 'index'])->name('jobs.index');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
