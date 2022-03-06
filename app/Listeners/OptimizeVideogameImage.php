<?php

namespace App\Listeners;

use App\Events\VideogameSaved;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class OptimizeVideogameImage implements ShouldQueue //cambiar env QUEUE_CONNECTION variable
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\VideogameSaved  $event
     * @return void
     */
    public function handle(VideogameSaved $event)
    {
        sleep(5);
        $image = Image::make(Storage::get($event->videogame->image))
            ->widen(400) //Altura de imagen dinámica segun el ancho
            ->limitColors(255)
            ->encode(); //Encodificar al tipo de imagen
            
        Storage::put($event->videogame->image, (string) $image);
    }
}
