<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $banners = Banner::inRandomOrder()->take(3)->get();
        return view('index', compact('banners'));
    }
}
