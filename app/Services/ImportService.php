<?php

namespace App\Services;

use App\Http\Requests\ImportUploadRequest;
use App\Jobs\ImportProducts;
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
                    if ($product = Product::where(['article' => $one['article']])) {
                        Product::where(['article' => $one['article']])->update($one);
                    } else {
                        $product = new Product();
                        $product->fill($one);
                        $product->save();
                    }
                    $import->status = 'done';
                }
            } else {
                $import->status = 'failed';
            }
        } else {
            $import->status = 'failed';
        }
        $import->save();

    }

    public function handleImportFromRequest(ImportUploadRequest $request): bool
    {
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file->getClientOriginalExtension() == "json") {

                $path = storage_path() . '/import/';
                $filename = 'import_' . time() . '.' . $file->getClientOriginalExtension();
                $request->file->move($path, $filename);

                $import = new Import();
                $import->user_id = backpack_user()->id;
                $import->filename = $filename;
                $import->status = 'new';
                $import->save();

                ImportProducts::dispatch($import);
                return true;
            }
        }

        return false;
    }
}
