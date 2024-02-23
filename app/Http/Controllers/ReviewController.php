<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{

    /**
     * @param ReviewStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ReviewStoreRequest $request): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Чтобы оставить отзыв, вам нужно авторизоваться.');
        }
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->user_id = auth()->id();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        return redirect()->back()->with('success', 'Отзыв успешно добавлен.');
    }
}

