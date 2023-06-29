<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\DashboardController;
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

Route::post('/admin/salva-relazione', [SponsorshipController::class, 'salvaRelazione'])->name('salva.relazione');

Route::get('/', function () {
    return view('auth.login');
});

/* commentata perchè spostata in middleware con controller*/

Route::get('/dashboard', function () {
    $userId = Auth::id(); // Ottiene l'ID dell'utente autenticato
    return view('admin.dashboard', ['userId' => $userId]);
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware(['auth', 'verified'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        // Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/', [DashboardController::class, 'index'], ['userId' => Auth::id()] )->name('dashboard');


        /*rotte appartamenti con crud gestite qui*/
        Route::resource('apartments', ApartmentController::class);
        Route::resource('sponsorships', SponsorshipController::class);
        Route::prefix('sponsorships')->group(function () {
            // Rotta "checkouts" all'interno del gruppo "sponsorships"
            Route::post('checkouts', [SponsorshipController::class, 'checkouts'])->name('sponsorships.checkouts');
            Route::post('payement', [SponsorshipController::class, 'payement'])->name('sponsorships.payement');
        });

        Route::resource('messages', MessageController::class);
        
});



/*rotte di profilo*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';