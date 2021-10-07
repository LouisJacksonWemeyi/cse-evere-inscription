<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class RegistrationNotification extends Mailable
{
    use Queueable, SerializesModels;


    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $mail = $this->from('info@csevere.be')->view('mails.registration.notification');

        $mail->subject = "Notification d'inscription";

        return $mail;
    }
}
