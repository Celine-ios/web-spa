<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class InvitationMail extends Mailable{
    use Queueable, SerializesModels;

    public $invitation;

    public function __construct($invitation){
        $this->invitation = $invitation;
    }

    public function build(){
        return $this->from(env('MAIL_FROM'), 'E-motion Gym')
        ->subject('Disfruta un dia en e-motion Gratis')
        ->view('emails.invitation')
        ->with([
            'invitation' => $this->invitation
        ]);
    }
}
