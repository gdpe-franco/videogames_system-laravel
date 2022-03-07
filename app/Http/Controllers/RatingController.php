<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;

class RatingController extends Controller
{
    public function show(Rating $rating)
    {
        return view('videogames.index', [
            'rating' => $rating,
            'videogames' => $rating->videogames()->load('rating')
        ]);
    }
}
