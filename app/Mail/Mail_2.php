<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class Mail_2 extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($datos = array())
    {
        $this->data = $datos;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        // var_dump($this->data);
        // exit();
        $this->subject("Restablecer Contraseña");
        return $this->view('mail.mail_2')->with([
            'data' => $this->data
        ]);
    }
}
