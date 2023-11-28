<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhoneNumberController extends Controller
{
    //
    public function storePhoneNumber(Request $request)
    {
        $phoneNumber = $request->input('phone_number');
        return response()->json(['message' => 'Phone number stored successfully']);
    }
}
