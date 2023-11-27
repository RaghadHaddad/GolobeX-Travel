<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;


class RoomController extends Controller
{
    //
    public function getRoomInfo(Request $request, $roomId)
    {
        $room = Room::find($roomId);
        
        if (!$room) {
            return response()->json(['message' => 'Room not found'], 404);
        }
        
        $roomInfo = [
            'roomType' => $room->roomType,
            'bedNum' => $room->bedNum,
            'startPrice' => $room->startPrice,
        ];
        
        return response()->json($roomInfo);
    }

}
