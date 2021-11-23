<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeersController;
use App\Http\Controllers\BeerscountController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return view('home');
});

Route::get('/beers/{page}', [BeersController::class, 'index']);

Route::get('/single-beer/{id}', [BeersController::class, 'show']);

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth','verified'])->name('dashboard');

Route::post('/delete-user', [UserController::class, 'delete']);

Route::get('/your-beer', [BeerscountController::class, 'show'])->middleware(['auth'])->name('your-beer');

Route::delete('/your-beer', [BeerscountController::class, 'delete']);

Route::post('/dashboard', [UserController::class, 'update']);

Route::post('/single-beer/{id}', [BeerscountController::class, 'create']);

Route::patch('/single-beer/{id}', [BeerscountController::class, 'update']);


/*  Email verification routes */

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/dashboard');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

require __DIR__.'/auth.php';
