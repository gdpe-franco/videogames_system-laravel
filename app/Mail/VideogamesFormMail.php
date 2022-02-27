<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VideogamesFormMail extends Mailable
{
    use Queueable, SerializesModels;


    public $videogame;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($videogame)
    {
        $this->videogame = $videogame;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.videogames.videogame-form');
    }
}
