<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Mail\EmailManager;
use App\mail\OrderEmail;
use App\mail\MailStatusOrder;
use Mail;

class testEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:test_email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $array['view'] = 'emails.pembayaran_berhasil';
        $array['from'] = env('MAIL_USERNAME');
        $array['subject'] = "Pembayaran Berhasil";
        $array['order_id'] = 22;
        Mail::to('jokostyawan267@gmail.com')->queue(new MailStatusOrder($array));
    }
}
