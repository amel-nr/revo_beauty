<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use DB;
use Mail;
use App\Mail\forumNotifEmail;
use Illuminate\Support\Facades\Auth;

class EmailForum extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:emailforum';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command for forum email notification';

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

        $fne = \App\forum_notif_email::orderBy('created_at', 'desc')->get();

        if (isset($fne)) {
            // dd($reply[1]->user->email);
            foreach ($fne as $key => $body) {
                if (isset($body->user->email)) {
                    // dd($body);
                    $terbalas = $body->post_id != 0 ? \App\Forum_Post_reply::where(["notifiable" => 1, 'post_id' => $body->post_id])->with(['user', 'post']) : \App\forum_comment_reply::where(["notifiable" => 1, 'reply_id' => $body->comment_id])->with(['user', 'comment']);
                    // dd($terbalas->get());
                    $send_email = $terbalas->orderBy('created_at', 'desc')->get();

                    if (isset($send_email)) {
                        foreach ($send_email as $k => $value) {

                            $pembalas = $value->user;
                            $label = [
                                $body->post_id != 0 ? "mengomentari" : "membalas",
                                $body->post_id != 0 ? "kiriman" : "komentar"
                            ];
                            $array['emailfrom'] = env('MAIL_USERNAME');
                            $nama = $pembalas != null ? $pembalas->name . " " . $pembalas->last_name . " " . $label[0] . " " . $label[1] : "Anonim" . " " . $label[0] . " " . $label[1];
                            $array['nama'] = $pembalas->user_id == $value->user_id ? "Anda" : $nama;
                            $array['judul'] = $body->post_id != 0 ? $value->post->title : $value->comment->text;
                            $array['balasan'] = $body->post_id != 0 ? $value->text : $value->isi;
                            $array['subject'] = "Balasan baru pada kiriman anda";
                            Mail::to($body->user->email)->queue(new forumNotifEmail($array));
                            // \App\forum_notif_email::where(['post_id' => $body->post_id, 'user_id' => $body->user_id])->delete();
                            $unnotified = $terbalas->findOrFail($value->id);
                            if ($unnotified) {
                                $unnotified->notifiable = 0;
                                $unnotified->save();
                            }
                        }
                    }
                }
            }
        }
    }
}
