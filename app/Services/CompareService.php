<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Specification;
use Illuminate\Support\Collection;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CompareService
{
    const KEY_SESSION = 'products_in_comparison';

    /**
     * @param int $id
     * @return void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function add(int $id): void
    {
        $productIds = session()->get(self::KEY_SESSION);
        $productIds[] = $id;
        $productIds = array_unique($productIds);

        session()->put(self::KEY_SESSION, $productIds);

    }

    /**
     * @param int $id
     * @return void
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */
    public function remove(int $id): void
    {
        $productIds = session()->get(self::KEY_SESSION);
        $index = array_search($id, $productIds);

        unset($productIds[$index]);

        session()->put(self::KEY_SESSION, $productIds);
    }

    /**
     * @param Collection $products
     * @return Collection
     */
    public function getSpecificationsByCategory(Collection $products): Collection
    {
        return Specification::query()
            ->whereHas('products', function ($builder) use ($products) {
                $builder->whereIn('product_id', $products->pluck('id'));
            })
            ->with('products', function ($builder) use ($products) {
                $builder->whereIn('product_id', $products->pluck('id'));
            })
            ->get();
    }
}
