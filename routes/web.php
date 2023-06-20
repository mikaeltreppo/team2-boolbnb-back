<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\ProfileController;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Message;

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


/* dobbiamo ricontrolare */

Route::get('/', function () {
    return view('welcome');
});

/* commentata perchè spostata in middleware con controller*/

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');
        /*rotte appartamenti con crud gestite qui*/
        Route::resource('apartments', ApartmentController::class);
        Route::resource('sponsorships', SponsorshipController::class);
        Route::resource('messages', MessageController::class);
        //Rotta per gestire il post delle sponsorizzazioni
        Route::post('sponsorship', [SponsorshipController::class, 'sponsorizeApartment'])->name('sponsorize.apartment');

    });


/*rotte di profilo*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';