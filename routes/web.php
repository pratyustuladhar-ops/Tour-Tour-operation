<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AiPlannerController;
use App\Http\Controllers\TourOperationsController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

// ── Auth routes (guests only) ─────────────────────────────────────────────────
Route::middleware('guest')->group(function () {
    Route::get('/auth/login',    [AuthController::class, 'showLogin'])->name('login');
    Route::get('/auth/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/auth/login',    [AuthController::class, 'login']);
    Route::post('/auth/register', [AuthController::class, 'register']);
});

// ── Logout (auth required) ────────────────────────────────────────────────────
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth')->name('logout');

// ── Admin routes (admin only — NOT visible to customers) ──────────────────────
Route::prefix('admin')->middleware(AdminMiddleware::class)->group(function () {
    Route::get('/',          [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/bookings',  [AdminController::class, 'bookings'])->name('admin.bookings');
    Route::get('/users',     [AdminController::class, 'users'])->name('admin.users');
    Route::patch('/users/{user}/make-admin',   [AdminController::class, 'makeAdmin'])->name('admin.makeAdmin');
    Route::patch('/users/{user}/remove-admin', [AdminController::class, 'removeAdmin'])->name('admin.removeAdmin');
    Route::delete('/users/{user}',             [AdminController::class, 'deleteUser'])->name('admin.deleteUser');
});

// ── Customer-facing routes ────────────────────────────────────────────────────
Route::get('/',          [TourOperationsController::class, 'index'])->name('home');
Route::get('/planner',   [TourOperationsController::class, 'planner'])->name('planner');
Route::get('/dashboard', [TourOperationsController::class, 'dashboard'])->name('dashboard')->middleware('auth');
Route::get('/bookings',  [TourOperationsController::class, 'bookings'])->name('bookings');
Route::post('/bookings', [TourOperationsController::class, 'store'])->name('bookings.store');

// ── AI Planner API ─────────────────────────────────────────────────────────────
Route::post('/api/planner/chat', [AiPlannerController::class, 'chat'])->name('ai.chat');
