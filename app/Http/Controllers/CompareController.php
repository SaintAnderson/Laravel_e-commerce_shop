<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Specification;
use App\Services\CompareService;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CompareController extends Controller
{
    protected CompareService $service;

    public function __construct()
    {
        $this->service = new CompareService();
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function index(): View
    {
        $productsIds = session()->get(CompareService::KEY_SESSION) ?? [];
        $productByCategory = Product::query()
            ->whereIn('id', $productsIds)
            ->with('specifications')
            ->get()
            ->groupBy('category_id');
        $specifications = collect([]);
        foreach ($productByCategory->keys() as $category_id) {
            $products = $productByCategory->get($category_id);
            $specifications->put($category_id, $this->service->getSpecificationsByCategory($products));
        }

        return view('products.compare', compact('productByCategory', 'specifications'));
    }

    public function add(Request $request)
    {
        $id = $request->get('id');
        $this->service->add($id);
    }

    public function remove(Request $request)
    {
        $id = $request->get('id');
        $this->service->remove($id);
    }
}
