<?php

namespace App\Http\Controllers;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    /**
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $service = resolve(ProductService::class);
        $products = $service->getActiveProducts();
        return view('catalog.index', compact('products'));
    }
}
