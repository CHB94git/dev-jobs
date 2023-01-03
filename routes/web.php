<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VacantController;
use App\Http\Controllers\ProfileController;

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

// Route::get('/', function () {
//     return view('welcome');
// })->name('home');

Route::get('/', HomeController::class)->name('home');


Route::controller(VacantController::class)->prefix('/dashboard')->group(function () {
    Route::get('/', 'index')->middleware(['auth', 'verified', 'role.recruiter'])->name('vacants.index');
    Route::get('vacants/create', 'create')->middleware(['auth', 'verified'])->name('vacants.create');
    Route::post('vacants/create', 'store')->middleware(['auth', 'verified'])->name('vacants.store');
    Route::get('vacants/{vacant}/edit', 'edit')->middleware(['auth', 'verified'])->name('vacants.edit');
    Route::get('vacants/{vacant}', 'show')->name('vacants.show');
});

Route::get('/candidates/{vacant}', [CandidateController::class, 'index'])->name('candidates.index');

// Notifications
Route::get('notifications', NotificationController::class)->middleware(['auth', 'verified', 'role.recruiter'])->name('notifications');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
