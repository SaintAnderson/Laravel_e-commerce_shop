<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Jobs\ImportProducts;
use App\Models\Import;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

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

    public function upload(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file' => 'required',
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            if ($file->getClientOriginalExtension() == "json") {

                $path = storage_path() . '/import/';
                //$filename = $file->getClientOriginalName();
                $filename = 'import_' . time() . '.' . $file->getClientOriginalExtension();
                $request->file->move($path, $filename);

                $import = new Import();
                $import->user_id = backpack_user()->id;
                $import->filename = $filename;
                $import->status = 'new';
                $import->save();

                ImportProducts::dispatch($import);
                return redirect('admin/import');
            }

            $error = "Некорректный формат файла";
            return back()->withErrors(['error' => $error]);
        }
        $error = "Ошибка загрузки файла";
        return back()->withErrors(['error' => $error]);
    }
}
