<?php

use App\Http\Controllers\LocaliteController1;
use App\Http\Controllers\LocaliteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('')->name('')->group(function () {
    Route::resource('site', SiteController::class);
});

Route::get('/site/download{site}', [SiteController::class, 'download'])->name('localite');

Route::get('/localite/create', [LocaliteController::class, 'create'])->name('localite');
Route::post('localite/import', [LocaliteController::class, 'import'])->name('localite.import');

require __DIR__ . '/auth.php';
