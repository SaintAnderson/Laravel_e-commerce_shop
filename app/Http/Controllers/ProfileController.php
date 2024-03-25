<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\ProductView;
use Illuminate\Http\{RedirectResponse, Request};
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    public function show(Request $request): View
    {
        $user = $request->user();
        $viewedProducts = $user->productViews()
            ->orderBy('viewed_at', 'desc')
            ->take(3)
            ->with('product')
            ->get();

        return view('profile.show', compact('user', 'viewedProducts'));
    }

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    public function viewedProducts(Request $request)
    {
        $user = $request->user();
        $viewedProducts = ProductView::where('user_id', $user->id)
            ->with('product')
            ->orderBy('viewed_at', 'desc')
            ->take(20)
            ->get();

        return view('profile.viewed-products', compact('viewedProducts'));
    }
    public function historyListOrders(Request $request)
    {
        $user = $request->user();
        $orders = $user->orders;

        return view('profile.history-list-orders', compact('orders'));
    }
}
