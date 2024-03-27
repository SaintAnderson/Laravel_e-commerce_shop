<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CartService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    protected CartService $cartService;

    /**
     * CartController constructor.
     * @param CartService $cartService
     */
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();
        $products = $this->cartService->list($sessionId);
        return view('cart', compact('products'));
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function add(Product $product): RedirectResponse
    {
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();
        $this->cartService->add($sessionId, $product);
        return redirect()->back();
    }

    /**
     * @param Product $product
     * @return RedirectResponse
     */
    public function remove(Product $product): RedirectResponse
    {
        $sessionId = Auth::check() ? auth()->user()->id : Session::getId();
        $this->cartService->remove($sessionId, $product);
        return redirect()->back();
    }
}
