<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendEmail extends Mailable{
    use Queueable, SerializesModels;

    public $order;
    public $total_amount;

    public function __construct($order, $total_amount){
        $this->order = $order;
        $this->total_amount = $total_amount;
    }

    /**
    * Build the message.
    *
    * @return $this
    */
    public function build(){
        if(isset($this->order->aprobacion))
        {
            return $this->from(env('MAIL_FROM'), 'Emotion Fit Center')
            ->subject('Orden de Pedido: ' . str_pad($this->order->id, 6, "0", STR_PAD_LEFT)." Ha sido aprobada.")
            ->view('emails.orders')
            ->with([
                'orden'        => $this->order,
                'total_amount' => round($this->total_amount),
                'aprobacion'   => 'ok',
            ]);
        }
        else
        {
            return $this->from(env('MAIL_FROM'), 'Emotion Fit Center')
            ->subject('Orden de Pedido: ' . str_pad($this->order->id, 6, "0", STR_PAD_LEFT))
            ->view('emails.orders')
            ->with([
                'orden'        => $this->order,
                'total_amount' => round($this->total_amount)
            ]);
        }
    }
}
