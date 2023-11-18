<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Flight;
class FlightController extends Controller
{
    //
    public function index()
    {
        $flights = Flight::with('company')->get();
        return response()->json($flights);
    }

    public function show($id)
    {
        $flight = Flight::with('company')->find($id);
        return response()->json($flight);
    }
}
