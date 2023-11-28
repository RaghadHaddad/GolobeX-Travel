<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;


class HotelController extends Controller
{
    //
    public function getLocation(Request $request, $hotelId)
    {
        $hotel = Hotel::find($hotelId);
        
        if (!$hotel) {
            return response()->json(['message' => 'Hotel not found'], 404);
        }
        
        $location = $hotel->location;
        
        return response()->json(['location' => $location]);
    }
}
