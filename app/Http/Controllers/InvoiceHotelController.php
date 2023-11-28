<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Room;

class InvoiceHotelController extends Controller
{
    //
    public function createInvoiceHotel(Request $request)
    {
        $room = Room::findOrFail($request->room_id);
        $payment = Payment::findOrFail($request->payment_id);
        $service = Service::findOrFail($request->service_id);


        $baseFee = $room->startPrice;
        $discount = $payment->discount;
        $tax = $payment->tax;
        $serviceFee = $service->servicePrice;
        $total = $baseFee - $discount + $tax + $serviceFee;
    
        return response()->json([
            'baseFee' => $baseFee,
            'discount' => $discount,
            'tax' => $tax,
            'serviceFee' => $serviceFee,
            'total' => $total,
        ]);
}

}
