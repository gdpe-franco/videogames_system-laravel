<?php

namespace App\Http\Controllers;

use App\Mail\VideogamesFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SaveVideogameRequest;
use App\Models\Videogame;

class VideogameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videogames = Videogame::get();

        return view('videogames.index', compact('videogames'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('videogames.create', [
            'videogame' => new Videogame
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SaveVideogameRequest $request)
    {
        //Insertar sólo los campos validados
        
        $videogame = Videogame::create($request -> validated());
        
        Mail::to('test@test.com')->send(new VideogamesFormMail($videogame));
        
        return redirect()->route('videogames.index')->with('status', 'Videogame stored succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Videogame $videogame)
    {
        return view('videogames.edit', [
            'videogame' => $videogame
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Videogame $videogame, SaveVideogameRequest $request) //i$d
    {
        $videogame->update($request->validated());
        return redirect()->route('videogames.index', $videogame)->with('status', 'Videogame updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videogame $videogame)
    {
        $videogame -> delete();
        return redirect()->route('videogames.index')->with('status', 'Videogame deleted succesfully');
    }
}
