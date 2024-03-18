<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethods;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(Request $request) {
        $deliveryMethods = DeliveryMethods::all();
        $user = $request->user();

        return view("checkout.index", compact('deliveryMethods', 'user'));
    }

    public function payment(Request $request) {
        return view('checkout.payment');
    }
}
