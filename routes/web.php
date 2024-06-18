<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminPanelController;
use App\Http\Controllers\ModeratorPanelController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserPanelController;
use App\Models\Transaction;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/admin/dashboard', function () {
    return view('/admin/dashboard');
})->middleware(['auth', 'verified'])->name('admin_dashboard');

Route::get('/balance', [UserPanelController::class, 'userBalance'])->name('userBalance');

Route::get('/admin/balance', [AdminPanelController::class, 'adminBalance'])->name('adminBalance');

Route::get('/admin/history', [TransactionController::class, 'transactionHistory'])->name('adminHistory');

Route::get('/admin/about', [AdminPanelController::class, 'adminAbout'])->name('adminAbout');

// Route::get('/admin/users', [AdminPanelController::class, 'userList'])->name('admin.userList');
// Route::get('/admin/users/{id}/edit', [AdminPanelController::class, 'editUser'])->name('admin.editUser');
// Route::post('/admin/users/{id}', [AdminPanelController::class, 'updateUser'])->name('admin.updateUser');
// Route::get('/admin/editUser/{id}', [AdminPanelController::class, 'editUser'])->name('admin.editUser');
// Route::put('/admin/updateUser/{id}', [AdminPanelController::class, 'updateUser'])->name('admin.updateUser');

Route::get('/admin/users', [AdminPanelController::class, 'userList'])->name('admin.userList');
Route::get('/admin/users/{id}/edit', [AdminPanelController::class, 'editUser'])->name('admin.editUser');
Route::put('/admin/users/{id}', [AdminPanelController::class, 'updateUser'])->name('admin.updateUser');

Route::get('/admin/dashboard', [AdminPanelController::class, 'adminDashboard'])->name('nav_admin_dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Ścieżki dostepu do ról

Route::middleware(['auth','role:admin'])->group(function() {
    Route::get('/admin/dashboard', [AdminPanelController::class, 'adminDashboard'])->name('admin.dashboard');
});


Route::get('/mod/dashboard', [ModeratorPanelController::class, 'moderatorDashboard'])->name('mod.dashboard');

//Ścieżki do przelewwów

Route::post('/transfer', [UserPanelController::class, 'transfer'])->name('transfer');

Route::get('/history', [TransactionController::class, 'userTransactionHistory'])->name('userHistory');

Route::get('/about', [UserPanelController::class, 'userAbout'])->name('userAbout');