<?php

namespace App\Http\Controllers;

use App\Mail\VideogamesFormMail;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
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
        
        $videogame = new Videogame($request -> validated()); //Se crea instancia de Modelo
        
        $videogame->image = $request->file('image')->store('images'); // en carpeta storage/public
        
        $videogame->save();

        $image = Image::make(Storage::get($videogame->image))
                ->widen(400) //Altura de imagen dinámica segun el ancho
                ->limitColors(255)
                ->encode(); //Encodificar al tipo de imagen
        
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
        if( $request->hasFile('image')){
            Storage::delete($videogame->image);

            $videogame->fill( $request -> validated() ); //Rellena los campos
        
            $videogame->image = $request->file('image')->store('images'); // en carpeta storage/public
        
            $videogame->save();

            $image = Image::make(Storage::get($videogame->image))
                ->widen(400) //Altura de imagen dinámica segun el ancho
                ->limitColors(255)
                ->encode(); //Encodificar al tipo de imagen
            
            Storage::put($videogame->image, (string)$image);

        } else {
            $videogame->update( array_filter($request->validated()) );
        }
    
        return redirect()->route('videogames.index', $videogame)
            ->with('status', 'Videogame updated succesfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Videogame $videogame)
    {
        Storage::delete($videogame->image);
        $videogame -> delete();
        return redirect()->route('videogames.index')->with('status', 'Videogame deleted succesfully');
    }
}
