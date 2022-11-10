<?php

namespace App\Mail;

use App\welcome;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;

    public $firstName;
    public $lastName;
    public $e_mail;
    public $msg;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($firstName, $lastName, $e_mail, $msg)
    {
        //
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->e_mail = $e_mail;
        $this->msg = $msg;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('cotizaciones@impotractor.com')
        ->markdown('emails.contactus');
    }
}
