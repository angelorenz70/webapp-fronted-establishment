<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Api\Version1\AnnouncementController;
use App\Http\Controllers\Api\Version1\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('homepage');
});

Route::get('/dashboard-announcements', [AnnouncementController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard-announcements');
Route::get('/dashboard-announcements/add-announcement', [AnnouncementController::class, 'create'])
->middleware(['auth', 'verified'])->name('dashboard-announcements/add-announcement');
Route::get('/dashboard-announcements/edit-announcement', [AnnouncementController::class, 'edit'])
->middleware(['auth', 'verified'])->name('dashboard-announcements/edit-announcement');


Route::get('/dashboard-users', [UserController::class, 'index'])
->middleware(['auth', 'verified'])->name('dashboard-users');


Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
