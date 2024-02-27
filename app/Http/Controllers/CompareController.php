<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Services\CompareService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CompareController extends Controller
{
    protected CompareService $service;
    public function __construct() {
        $this->service = new CompareService();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): View
    {
        $productsIds = session()->get(CompareService::KEY_SESSION) ?? [];
        $products = Product::whereIn('id', $productsIds)->get();
        $productByCategory = $products->groupBy('category_id');

        return view('products.compare', compact('products', 'productByCategory'));
    }

    public function add(Request $request) {
        $id = $request->get('id');
        $this->service->add($id);
    }

    public function remove(Request $request) {
        $id = $request->get('id');
        $this->service->remove($id);
    }
}
