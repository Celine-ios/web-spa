<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendRejectedMail extends Mailable{
    use Queueable, SerializesModels;

    public $order;

    public function __construct($order){
        $this->order   = $order;
    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build(){
        return $this->from(env('MAIL_FROM'), 'Tauret Computadores')
        ->subject('Su Orden # ' . str_pad($this->order->id, 6, "0", STR_PAD_LEFT) . ' ha sido rechazada')
        ->view('emails.rejected')
        ->with([
            'orden' => $this->order
        ]);
    }
}
