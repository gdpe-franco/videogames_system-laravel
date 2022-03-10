<?php

namespace App\Http\Controllers;

use App\Events\VideogameSaved;
use App\Http\Requests\SaveVideogameRequest;
use App\Mail\VideogamesFormMail;
use App\Models\Videogame;
use App\Models\Rating;
use App\Models\Console;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;


class VideogameController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }
    
    public function index()
    {
        return view('videogames.index', [
            'newVideogame' => new Videogame,
            'videogames' => Videogame::with('console', 'rating')->get(),
            'deletedVideogames' => Videogame::onlyTrashed()->get(),
        ]);
    }

    
    public function create()
    {
        $this->authorizeResource(Videogame::class, 'create');
        
        return view('videogames.create', [
            'videogame' => $videogame = new Videogame,
            'ratings' => Rating::pluck('name', 'id'),
            'consoles' => Console::pluck('name', 'id'),
        ]);
        
    }

    
    public function store(SaveVideogameRequest $request)
    {
        //Insertar sólo los campos validados
        
        $videogame = new Videogame($request -> validated()); //Se crea instancia de Modelo

        $this->authorize('create', $videogame);
        
        $videogame->image = $request->file('image')->store('images'); // en carpeta storage/public
        
        $purchase_price = $request -> get('purchase_price');

        $videogame['sale_price'] = $purchase_price * 1.4;

        $videogame->save();

        VideogameSaved::dispatch($videogame);
        
        Mail::to('test@test.com')->send(new VideogamesFormMail($videogame));
        
        return redirect()->route('videogames.index')->with('status', 'Videogame stored succesfully!');
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit(Videogame $videogame)
    {
        $this->authorize('update', $videogame);

        return view('videogames.edit', [
            'videogame' => $videogame,
            'ratings' => Rating::pluck('name', 'id'),
            'consoles' => Console::pluck('name', 'id'),
        ]);
    }

    
    public function update(Videogame $videogame, SaveVideogameRequest $request) //i$d
    { 
        if( $request->hasFile('image')){
            //Storage::delete($videogame->image);

            $videogame->fill( $request -> validated() ); //Rellena los campos
        
            $videogame->image = $request->file('image')->store('images'); // en carpeta storage/public
        
            $purchase_price = $request -> input('purchase_price');

            $videogame['sale_price']= $purchase_price*1.4;

            $videogame->save();

            VideogameSaved::dispatch($videogame);

        } else {
            $purchase_price = $request -> input('purchase_price');

            $videogame['sale_price']= $purchase_price*1.4;
            
            $videogame->update( array_filter($request->validated()) );
        }
    
        return redirect()->route('videogames.index', $videogame)
            ->with('status', 'Videogame updated succesfully!');
    }

    
    public function destroy(Videogame $videogame)
    {
        $this->authorize('delete', $videogame);

        $videogame -> delete();

        return redirect()->route('videogames.index')->with('status', 'Videogame deleted succesfully');
    }


    public function restore($videogameUrl)
    {
        $videogame = Videogame::withTrashed()->whereUrl($videogameUrl)->firstOrFail();

        $this->authorize('restore', $videogame);
        
        $videogame -> restore();

        return redirect()->route('videogames.index')->with('status', 'Videogame restored succesfully');
    }


    public function forceDelete($videogameUrl)
    {
        $videogame = Videogame::withTrashed()->whereUrl($videogameUrl)->firstOrFail();
        
        $this->authorize('force-delete', $videogame);

        Storage::delete($videogame->image);

        $videogame -> forceDelete();
        return redirect()->route('videogames.index')->with('status', 'Videogame deleted permanently');
    }
}
