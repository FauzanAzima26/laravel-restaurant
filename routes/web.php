<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\ChefController;
use App\Http\Controllers\Backend\MenuController;
use App\Http\Controllers\Backend\eventController;
use App\Http\Controllers\Backend\ImageController;
use App\Http\Controllers\Backend\VideoController;
use App\Http\Controllers\Frontend\mainController;
use App\Http\Controllers\Backend\reviewController;
use App\Http\Controllers\Frontend\bookingController;
use App\Http\Controllers\Backend\transactionController;
use App\Http\Controllers\Frontend\frontReviewController;

Route::get('/', mainController::class);

Route::post('booking', [bookingController::class, 'store'])->name('booking');
Route::post('review', [frontReviewController::class, 'store'])->name('front.review');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('backend.dashboard.index');
    })->name('dashboard');

    Route::resource('image', ImageController::class)->names('image');

    Route::resource('menu', MenuController::class)->names('menu');

    Route::resource('chef', ChefController::class)->names('chef');

    Route::resource('video', VideoController::class)->names('video');

    Route::resource('event', eventController::class)->names('event');

    Route::post('transaction/download', [transactionController::class, 'download'])->name('transaction.download');
    Route::resource('transaction', transactionController::class)
    ->except(['edit', 'create', 'store']) 
    ->names('transaction');

    Route::resource('review', reviewController::class)->names('review')
    ->only(['index', 'destroy', 'show']);


});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
