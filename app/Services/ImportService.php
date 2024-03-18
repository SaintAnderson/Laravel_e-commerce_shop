<?php

namespace App\Services;

use App\Models\Product;
use App\Models\Import;

class ImportService
{
    /**
     * @param Import $import
     */
    public function parse(Import $import)
    {
        $import->status = 'processing';
        $import->save();
        if (filesize(storage_path() . '/import/' . $import->filename) > 0) {
            $file = file_get_contents(storage_path() . '/import/' . $import->filename);
            $products = json_decode($file, true);
            if (count($products) > 0) {
                foreach ($products as $one) {
                    $product = new Product();
                    $product->fill($one);
                    $product->save();
                }
                $import->status = 'done';
            } else {
                $import->status = 'failed';
            }
        } else {
            $import->status = 'failed';
        }
        $import->save();

    }
}
