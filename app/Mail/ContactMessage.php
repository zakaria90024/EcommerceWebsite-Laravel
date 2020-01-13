<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContactMessage extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public $message_to_send = 0;
     public $firstname_to_send = 0;
    public function __construct(  $first_name,$message)
    {
       $this -> firstname_to_send = $first_name;
       $this -> message_to_send = $message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('Mail.contactsmsmail', compact('firstname_to_send','message_to_send'));
    }
}
