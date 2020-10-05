<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $array;

    public function __construct($array)
    {
        //
         $this->array = $array;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.reset_password',env('MAIL_FROM_NAME'))
                    ->from($this->array['from'])
                    ->with([
                        'nama' => $this->array['nama'],
                        'link' => $this->array['link'],
                    ])->subject($this->array['subject']);
    }
}
