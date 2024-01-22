<?php

namespace App\Http\Controllers;

use App\Services\ReviewService;

class ReviewController extends Controller
{
    protected ReviewService $reviewService;

    public function __construct(ReviewService $reviewService)
    {
        $this->reviewService = $reviewService;
    }

    public function getReviews()
    {
        $url = 'https://yandex.ru/maps/org/225599149948/reviews/';

        return $this->reviewService->getReviews($url);
    }
}
