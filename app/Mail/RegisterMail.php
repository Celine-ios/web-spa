<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegisterMail extends Mailable{
    use Queueable, SerializesModels;

    public $user;

    public function __construct($user){
        $this->user =  $user;
    }

    public function build(){
        return $this->from(env('MAIL_FROM'), 'Tauret Computadores')
        ->subject('Registro de Usuario')
        ->view('emails.register')
        ->with([
            'user' => $this->user
        ]);
    }
}
