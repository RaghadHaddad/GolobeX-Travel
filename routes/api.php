<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FlightController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\PaymentMethodController;
use App\Http\Controllers\PhoneNumberController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomBookingController;
use App\Http\Controllers\InvoiceHotelController;








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
//show of Companies
Route::get('/show/companies',[CompanyController::class,'index']);
//Add company
Route::post('/Add/company',[CompanyController::class,'store']);

//For Flights
Route::get('/flights', [FlightController::class, 'ForBookDetailIndex']);
Route::get('/flights/{id}', [FlightController::class, 'ForBookDetailshow']);
//show of Flights
Route::get('/show/flights',[FlightController::class,'index']);
//Add Flight
Route::post('/Add/flight',[FlightController::class,'store']);
//search of flight
Route::get('/flights/search', [FlightController::class, 'search']);
//join between flight and company
Route::post('/show/companyDetails/{id}',[FlightController::class,'show']);

//Payment Method
Route::post('/payment/set-method', [PaymentMethodController::class, 'setPaymentMethod']);

//Phone Number
Route::post('/phone-number/store', [PhoneNumberController::class, 'storePhoneNumber']);

//Invoice
Route::post('/invoices', [InvoiceController::class, 'createInvoice']);

//Card
Route::get('/cards', [CardController::class, 'store']);

//For Room
Route::get('rooms/{roomId}', [RoomController::class, 'getRoomInfo']);

//For Hotel Location
Route::get('hotels/{hotelId}', [HotelController::class, 'getLocation']);

//For Room Booking
Route::post('/reservation-dates', [RoomBookingController::class, 'getReservationDates']);
//Invoice For Hotel
Route::post('/invoiceshotel', [InvoiceHotelController::class, 'createInvoiceHotel']);





