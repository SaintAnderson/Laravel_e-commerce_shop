<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewStoreRequest;
use App\Services\ReviewService;
use Illuminate\Http\RedirectResponse;

class ReviewController extends Controller
{
    /**
     * @var ReviewService
     */
    private ReviewService $reviewService;

    /**
     * @param ReviewService $reviewService
     */
    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    /**
     * @param ReviewStoreRequest $request
     * @return RedirectResponse
     */
    public function store(ReviewStoreRequest $request): RedirectResponse
    {
        if (!auth()->check()) {
            return redirect()->back()->with('error', 'Чтобы оставить отзыв, вам нужно авторизоваться.');
        }
        $this->reviewService->createFromRequest($request);
        return redirect()->back()->with('success', 'Отзыв успешно добавлен.');
    }
}
