<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailCoupon extends Mailable
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
        return $this->from($this->array['emailfrom'],env('MAIL_FROM_NAME'))
            ->view('emails.email_coupon')
            ->with([
                'nama' => $this->array['nama'],
                'code_kupon' => $this->array['code_kupon'],
                'subject' => $this->array['subject'],
            ])
            ->subject($this->array['subject']);
    }
}
