<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeersController;
use App\Http\Controllers\BeerscountController;
use App\Http\Controllers\UserController;

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

Route::get('/dashboard', [UserController::class, 'index'])->middleware(['auth'])->name('dashboard');

Route::get('/your-beer', [BeerscountController::class, 'show'])->middleware(['auth'])->name('your-beer');

Route::post('/dashboard', [UserController::class, 'update']);

Route::post('/single-beer/{id}', [BeerscountController::class, 'create']);

require __DIR__.'/auth.php';
