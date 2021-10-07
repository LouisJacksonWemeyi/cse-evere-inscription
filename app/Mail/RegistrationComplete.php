<?php

namespace App\Mail;

use App\ConfigText;
use App\Registration;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationComplete extends Mailable
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
        $this->mail_custom_text_1 = ConfigText::where('id', 1)->first();
        $this->mail_custom_text_2 = ConfigText::where('id', 2)->first();
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from('info@csevere.be')->view('mails.registration.complete')->with(['registration' => $this->registration, 
                  'mail_custom_text_1' => $this->mail_custom_text_1->text,
                  'mail_custom_text_2' => $this->mail_custom_text_2->text]);

        $mail->subject = "Confirmation de la demande d'inscription";

        return $mail;
    }
}
