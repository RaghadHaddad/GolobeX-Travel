<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\Service;
use App\Models\Flight;

class InvoiceController extends Controller
{
    //
    public function createInvoice(Request $request)
    {
        $flight = Flight::findOrFail($request->flight_id);
        $payment = Payment::findOrFail($request->payment_id);
        $service = Service::findOrFail($request->service_id);


        $baseFee = $flight->price;
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
