<?php

namespace App\Mail;

use App\ConfigText;
use App\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationPaid extends Mailable
{
    use Queueable, SerializesModels;

    //public $cc = ["info@csevere.be"];

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        $this->registration = Registration::where('id', $id)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from('info@csevere.be')->view('mails.registration.paid')->with(['registration' => $this->registration]);

        $mail->subject = "Confirmation du paiement de l'inscription";

        return $mail;
    }
}
