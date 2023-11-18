<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    //
    public function setPaymentMethod(Request $request)
    {
        $paymentMethod = $request->input('payment_method');
        $cardNumber = $request->input('card_number');

        if ($paymentMethod === 'cash') {
            return response()->json(['message' => 'Cash payment method selected']);
        } elseif ($paymentMethod === 'pay part') {
            return response()->json(['message' => 'pay part payment method selected']);
        } else {
            return response()->json(['error' => 'Invalid payment method'], 400);
        }
    }
}
