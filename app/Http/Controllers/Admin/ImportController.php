<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ImportUploadRequest;
use App\Jobs\ImportProducts;
use App\Models\Import;
use App\Services\ImportService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ImportController extends Controller
{
    public function index(): View
    {
        $title = 'Импорт товаров';
        $rows = Import::all();
        $find = 0;
        foreach ($rows as $row) {
            if ($row->status == 'processing') {
                $find = 1;
            }
        }

        return view('import.index', compact('title', 'rows', 'find'));
    }

    public function create(): View
    {
        $title = 'Добавление товаров';
        return view('import.create', compact('title'));
    }

    public function upload(ImportUploadRequest $request, ImportService $service): RedirectResponse
    {
        if ($service->handleImportFromRequest($request)) {
            return redirect('admin/import');
        }
        $error = "Ошибка загрузки файла";
        return back()->withErrors(['error' => $error]);
    }
}
