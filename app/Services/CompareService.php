<?php

namespace App\Services;

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
}
