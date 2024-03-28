<?php

namespace App\Http\Controllers;

use App\Facades\CouponFacade;
use App\Facades\PayFacade;
use App\Models\Coupon;
use App\Models\DeliveryMethods;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductOrder;
use App\Services\CartService;
use Darryldecode\Cart\Exceptions\InvalidConditionException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    protected CartService $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index(Request $request)
    {
        $deliveryMethods = DeliveryMethods::all();
        $user = $request->user();

        return view("checkout.index", compact('deliveryMethods', 'user'));
    }

    public function payment(Request $request)
    {
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();

        $delivery = DeliveryMethods::find($request->delivery_id);
        PayFacade::addPrice($this->cartService->prices($sessionId));
        PayFacade::addPrice($delivery->price);
        $coupon = CouponFacade::coupon($request->coupon)->activate()->get();
        PayFacade::coupon($coupon);

        $order = new Order($request->all());
        $order->pay = $request->pay == 'someone';
        $order->fullprice = PayFacade::getPrice();
        $order->user_id = auth()->user()->id;
        $order->save();

        $products = $this->cartService->list($sessionId);

        foreach ($products as $product) {
            $productOrder = new ProductOrder();
            $productOrder->order_id = $order->id;
            $productOrder->product_id = $product->id;
            $productOrder->price = $product->price;
            $productOrder->save();
            $this->cartService->remove($sessionId, Product::find($product->id));
        }
        return redirect(route('profile.show'));
    }

    /**
     * @throws InvalidConditionException
     */
    public function delivery(Request $request)
    {
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();
        $deliveryCost = $request->get('delivery_cost');
        $this->cartService->addDeliveryCost($sessionId, $deliveryCost);

        return redirect('/checkout/payment');
    }
}
