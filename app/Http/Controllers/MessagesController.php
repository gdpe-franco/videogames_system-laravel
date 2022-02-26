<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function store()
    {
        request()->validate([
            'title' => 'required',
            'rating' => 'required',
            'console' => 'required',
            'purchase_price' => 'required',
            'sale_price' => 'required',
            'url' => 'required', 
        ]);
        return 'Validated data';
    }
}
