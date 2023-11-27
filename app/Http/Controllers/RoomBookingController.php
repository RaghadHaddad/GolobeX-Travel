<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RoomBooking;


class RoomBookingController extends Controller
{
    //
    public function getReservationDates(Request $request)
    {
        $booksId = $request->input('room_books_id');

        $books = RoomBooking::find($booksId);

        if (!$books) {
            return response()->json(['error' => 'Booking not found'], 404);
        }

        $reservationStart = $books->reservationStart;
        $reservationEnd = $books->reservationEnd;

        return response()->json([
            'reservation_start' => $reservationStart,
            'reservation_end' => $reservationEnd,
        ]);
    }


}
