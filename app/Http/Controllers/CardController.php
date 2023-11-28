<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Card;
use App\Models\Payment;


class CardController extends Controller
{
    //
    public function store(Request $request)
    {
        $card = Card::create($request->all());

        return response()->json($card, 201);
    }
}
