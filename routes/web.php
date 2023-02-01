<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (Auth::check() && Auth::user()->roles == 'applicant') {
        return redirect('/applicant');
    }else{
        return redirect('/admin');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('applicant')->group(function () {
    // Route::get('/applicant', [ProfileController::class, 'profil'])->name('profile');
    Route::get('/applicant/setting/security', [ProfileController::class, 'profileSecurity'])->name('profile.profileSecurity');
    Route::get('/applicant', [ProfileController::class, 'profileAccount'])->name('profile.profileAccount');
    Route::post('/applicant', [ProfileController::class, 'upload']);
    Route::patch('/applicant/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/applicant/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('admin')->group(function () {
    // Route::get('/applicant', [ProfileController::class, 'profil'])->name('profile');
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/applicant/{id}', [AdminController::class, 'applicant']);
   
});

require __DIR__.'/auth.php';
