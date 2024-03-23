<?php

namespace App\Http\Controllers;

use App\Models\DeliveryMethods;
use App\Services\CartService;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService) {
        $this->cartService = $cartService;
    }

    public function index(Request $request) {
        $deliveryMethods = DeliveryMethods::all();
        $user = $request->user();

        return view("checkout.index", compact('deliveryMethods', 'user'));
    }

    public function payment(Request $request) {
        return view('checkout.payment');
    }

    /**
     * @throws InvalidConditionException
     */
    public function delivery(Request $request) {
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();
        $deliveryCost = $request->get('delivery_cost');
        $this->cartService->addDeliveryCost($sessionId, $deliveryCost);

        return redirect('/checkout/payment');
    }
}
