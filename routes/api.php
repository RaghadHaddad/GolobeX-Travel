<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\FlightController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
//show of Flights
Route::get('/show/flights',[FlightController::class,'index']);
//Add Flight
Route::post('/Add/flight',[FlightController::class,'store']);
//search of flight
Route::get('/flights/search', [FlightController::class, 'search']);
//join between flight and company
Route::post('/show/companyDetails/{id}',[FlightController::class,'show']);
//show of Companies
Route::get('/show/companies',[CompanyController::class,'index']);
//Add company
Route::post('/Add/company',[CompanyController::class,'store']);

