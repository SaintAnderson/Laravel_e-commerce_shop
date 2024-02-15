<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Services\CategoryService;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    protected $categoryService;

    public function __construct(CategoryService $categoryService)
    {
        $this->categoryService = $categoryService;
    }

    public function index(): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        $pinnedCategories = $this->categoryService->getPinnedCategories();
        return view('index', compact('banners', 'pinnedCategories'));
    }
}
