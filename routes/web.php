<?php

use App\Http\Controllers\WebsiteController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Auth/Login');
});

Route::group(['middleware' => ['auth', 'verified']], function () {
    Route::get('/dashboard', [WebsiteController::class, 'index'])->name('dashboard');
    Route::get('/website/create', [WebsiteController::class, 'create'])->name('website.create');
    Route::get('/website/{website}', [WebsiteController::class, 'show'])->name('website.show');
    Route::get('/website/{website}/edit', [WebsiteController::class, 'edit'])->name('website.edit');
    Route::post('/website/{website}', [WebsiteController::class, 'update'])->name('website.update');
    Route::delete('/website/{website}', [WebsiteController::class, 'destroy'])->name('website.destroy');
    Route::post('/website', [WebsiteController::class, 'store'])->name('website.store');
});

require __DIR__.'/auth.php';
