<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CardController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//For Company
Route::get('/companies', [CompanyController::class, 'index']);
Route::get('/companies/{id}', [CompanyController::class, 'show']);

//For Flights
Route::get('/flights', [FlightController::class, 'index']);
Route::get('/flights/{id}', [FlightController::class, 'show']);

//Payment Method
Route::post('/payment/set-method', [PaymentMethodController::class, 'setPaymentMethod']);

//Phone Number
Route::post('/phone-number/store', [PhoneNumberController::class, 'storePhoneNumber']);

//Invoice
Route::post('/invoices', [InvoiceController::class, 'createInvoice']);

//Card
Route::get('/cards', [CardController::class, 'store']);


