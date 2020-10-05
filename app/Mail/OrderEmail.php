<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class OrderEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    private $array;
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
         return $this->from($this->array['from'],env('MAIL_FROM_NAME'))
            ->view('emails.konfirmasi_pesanan')
            ->with([
                'order_id' => $this->array['order_id']
            ])
            ->subject($this->array['subject']);
    }
}
