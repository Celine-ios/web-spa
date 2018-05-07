<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message;

    public function __construct($message){
        $this->message = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from($this->message->email, $this->message->nombre)
        ->subject('Contacto a través de Emotion Fit Center')
        ->view('emails.message')
        ->with([
            'mensaje' => $this->message
        ]);
    }
}
