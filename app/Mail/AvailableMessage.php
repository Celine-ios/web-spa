<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class AvailableMessage extends Mailable
{
    use Queueable, SerializesModels;

    public $message;
    public $user;

    public function __construct($message, $user){
        $this->message = $message;
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(){
        return $this->from($this->message->email, $this->message->nombre)
        ->subject($this->message->title)
        ->view('emails.available')
        ->with([
            'mensaje' => $this->message,
            'usuario' => $this->user
        ]);
    }
}