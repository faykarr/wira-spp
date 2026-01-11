<?php

use App\Livewire\Dashboard;
use App\Livewire\Users;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

// Dashboard - hanya untuk user yang sudah login
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', Dashboard::class)->name('dashboard');
});

// User Management - hanya untuk user dengan permission manage-users
Route::middleware(['auth', 'can:manage-users'])->group(function () {
    Route::get('/users', Users\Index::class)->name('users.index');
});
