<?php

namespace App\Http\Controllers;

use App\Models\Console;
use Illuminate\Http\Request;

class ConsoleController extends Controller
{
    public function show(Console $console)
    {
        return view('videogames.index', [
            'console' => $console,
            'videogames' => $console->videogames()->with('console')->get()
        ]);
    }
}
