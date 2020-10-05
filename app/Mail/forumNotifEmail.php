<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class forumNotifEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $data;
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    // public function build()
    // {
    //     return $this->view('view.name');
    // }
    public function build()
    {
        return $this->from($this->data['emailfrom'],env('MAIL_FROM_NAME'))
                   ->view('emails.forum')
                   ->with([
                    'nama' => $this->data['nama'],
                    'judul' => $this->data['judul'],
                    'balasan' => $this->data['balasan'],
                ])
                ->subject($this->data['subject']);
    }
}
