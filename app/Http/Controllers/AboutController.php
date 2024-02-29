<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\SettingService;
use App\Services\ProductService;

class AboutController extends Controller
{
    protected $settingService;
    protected $productService;

    public function __construct(SettingService $settingService, ProductService $productService)
    {
        $this->settingService = $settingService;
        $this->productService = $productService;
    }

    public function index()
    {
        $title = $this->settingService->get('shop_title');
        $description = $this->settingService->get('shop_description');
        $popularProducts = $this->productService->getPopular();

        return view('about.index', compact('title', 'description', 'popularProducts'));
    }
}
