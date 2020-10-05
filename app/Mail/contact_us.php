<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class contact_us extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */

    private $data;
    public function __construct($p)
    {
        $this->data = [
            'emailfrom' => $p['email'],
            'name' => $p['name'],
            'subject' => $p['subject'],
            'text' => $p['text']
        ];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        return $this->from($this->data['emailfrom'])
            ->view('emails.email')
            ->with([
                'name' => $this->data['name'],
                'email' => $this->data['emailfrom'],
                'subject' => $this->data['subject'],
                'text' => $this->data['text']
            ])
            ->subject($this->data['subject']);
    }
}
