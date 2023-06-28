<?php

use App\Http\Controllers\Admin\ApartmentController;
use App\Http\Controllers\Admin\SponsorshipController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\ProfileController;
use App\Models\Sponsorship;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Mime\Message;
use Illuminate\Http\Request;
use Braintree\Gateway;

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
    return view('auth.login');
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

        Route::post('checkout', function (Request $request) {
            $gateway = new Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey')
            ]);

            $amount = $request->amount;
            $nonce = $request->payment_method_nonce;

            $result = $gateway->transaction()->sale([
                'amount' => $amount,
                'paymentMethodNonce' => $nonce,
                'customer' => [
                    'firstName' => 'Tony',
                    'lastName' => 'Stark',
                    'email' => 'tony@avengers.com',
                ],
                'options' => [
                    'submitForSettlement' => true
                ]
            ]);

            if ($result->success) {
                $transaction = $result->transaction;
                // header("Location: transaction.php?id=" . $transaction->id);

                return back()->with('success_message', 'Transaction successful. The ID is:' . $transaction->id);
            } else {
                $errorString = "";

                foreach ($result->errors->deepAll() as $error) {
                    $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
                }

                // $_SESSION["errors"] = $errorString;
                // header("Location: index.php");
                return back()->withErrors('An error occurred with the message: ' . $result->message);
            }
        });

        Route::get('hosted', function () {
            $gateway = new Gateway([
                'environment' => config('services.braintree.environment'),
                'merchantId' => config('services.braintree.merchantId'),
                'publicKey' => config('services.braintree.publicKey'),
                'privateKey' => config('services.braintree.privateKey')
            ]);

            $token = $gateway->ClientToken()->generate();

            return view('admin.hosted', [
                'token' => $token
            ]);
        });

        /*Rotta per gestire il post delle sponsorizzazioni
        Route::post('sponsorship', [SponsorshipController::class, 'sponsorizeApartment'])->name('sponsorize.apartment');
        */
    });


/*rotte di profilo*/

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//rotte di braintree





require __DIR__ . '/auth.php';
