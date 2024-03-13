<?php

namespace App\Services;

use App\Http\Requests\ReviewStoreRequest;
use App\Models\Review;
use Illuminate\Support\Facades\Auth;

class ReviewService
{
    /**
     * @param ReviewStoreRequest $request
     * @return Review
     */
    public function createFromRequest(ReviewStoreRequest $request): Review
    {
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->user_id = Auth::id();
        $review->rating = $request->rating;
        $review->comment = $request->comment;
        $review->save();
        return $review;
    }
}
