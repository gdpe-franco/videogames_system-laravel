<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use Illuminate\Http\Request;
use App\Models\Videogame;

class RatingController extends Controller
{
    public function show(Rating $rating)
    {
        return view('videogames.index', [
            'rating' => $rating,
            'videogames' => $rating->videogames()->with('rating')->get(),
            'deletedVideogames' => Videogame::onlyTrashed()->get(),
        ]);
    }
}
