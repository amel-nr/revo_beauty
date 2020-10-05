<?php

namespace App\Http\Controllers;

use Auth;

use App\Forum;
use App\Forum_topics;
use App\Forum_rooms;
use App\Forum_like;
use App\forum_comment_like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use ImageOptimizer;
use App\Mail\forumNotifEmail;
use Illuminate\Support\Facades\Mail;

class ForumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Forum::with('room')->orderBy("created_at", "desc")->get();
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function show(Forum $forum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function edit(Forum $forum)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Forum $forum)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Forum  $forum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Forum $forum)
    {
        //
    }

    public function getRoom($id)
    {
        $room = \App\Forum_rooms::where('id', $id)->get();

        foreach ($room as $key => $r) {
            $user = \App\Forum_user_room::select('user_id')->where('room_id', $r["id"]);
            $posts = Forum::where('room_id', $r["id"])->with(['rekomendasi.product', 'user', 'user.user_tier', 'reply', 'reply.rekomendasi.product', 'reply.user', 'like'])->orderBy('created_at', 'desc')->get();

            $r["total_user"] = count($user->get());
            if (Auth::check()) {
                $check = $user->where('user_id', Auth::user()->id)->get();
                $r["join"] = "GABUNG";
                if (count($check) > 0) {
                    $r['join'] = "LEAVE";
                }
            }


            $r["posts"] = $posts;
            // $r["reply"] = $reply;
            $room[$key] = $r;
        }
        // $room[0]['jquery'] = "<script>$('#cuiok').on('click', function () {let filter = [];console.log($('.topicsfilter:checked').val())})</script>";
        $data = [
            'room' => $room,
            'topics' => \App\Forum_topics::all()
        ];
        // dd($data);
        return $data;
    }

    public function myroom()
    {
        $r_id = \App\Forum_user_room::where('user_id', Auth::user()->id)->with(["room", "room.post", "user"])->get();
        // $posts = $r_id->pluck("room.post");

        $data = [
            "room" => $r_id->pluck("room")
        ];

        // dd($data);
        return $data;
    }

    public function popular_topics()
    {
        $topics = \App\Forum_topics::with('room')->withCount('room')->limit(5)->orderBy('room_count', 'desc')->get();
        return $topics;
    }

    public function sortRoom($s)
    {
        $r_id = \App\Forum_rooms::with(["user", "post", "user.user"])->withCount('post')->withCount('user');
        if ((int)$s == 1) {
            $r_id = $r_id->orderBy('post_count', 'desc');
        } elseif ((int)$s == 2) {
            $r_id =  $r_id->orderBy('user_count', 'desc');
        } else {
            $r_id = $r_id->orderBy('title');
        }
        $r_id = $r_id->get();

        foreach ($r_id as $key => $r) {
            $user = \App\Forum_user_room::select('user_id')->where('room_id', $r["id"]);
            if (Auth::check()) {
                $check = $user->where('user_id', Auth::user()->id)->get();
                $r["join"] = "GABUNG";
                if (count($check) > 0) {
                    $r['join'] = "LEAVE";
                }
            }
            $room[$key] = $r;
        }

        $data = [
            "room" => $room
        ];

        // dd($data);
        return $data;
    }

    public function getPosts($id, $query)
    {
        $forum = new Forum;
        if ($query == "3") {
            return [];
        }
        if ($query != "0") {
            $forum = $forum->where('title', 'like', '%' . $query . '%');
            // dd($forum->get());
        }
        return $forum->where('room_id', $id)->with(['like', 'reply', 'reply.user', 'user', 'rekomendasi', 'rekomendasi.product'])->orderBy("created_at", "desc")->get();
    }

    public function getfilteredRoom($filter = null, $sortby = null, $myroom = 0, $query)
    {
        $data = [$filter, $sortby];

        $room = \App\Forum_rooms::where('id', '>', 0);
        $filteredroom = "";
        // dd($filter);

        if ($filter != 'empty' && $filter != null) {
            $filter = explode(",", $filter);
            $room = $room->whereIn('topics_id', $filter);
        }

        if ((int)$myroom != 0) {
            $uroom = \App\Forum_user_room::where("user_id", $myroom)->get()->pluck("room_id")->toArray();
            $room = $room->whereIn('id', $uroom);
        }

        if ($query != '0') {
            $room = $room->where('title', 'like', "%$query%");
        }

        $room = $room->get();

        foreach ($room as $key => $r) {
            $user = \App\Forum_user_room::select(['user_id', 'id'])->where('room_id', $r["id"]);
            $posts = Forum::where('room_id', $r["id"])->with(['user', 'reply', 'reply.user', 'like'])->get();
            $r["orderby"] = 0;

            if ($sortby != null || $sortby != "0" || $sortby != 0) {
                switch ($sortby) {
                    case "1":
                        $r["orderby"] = count($posts);
                        break;
                    case "2":
                        $r["orderby"] = count($user->get());
                        break;
                    default:
                        $r["orderby"] = 0;
                }
            }


            $r["total_user"] = count($user->get());
            $r["join"] = "GABUNG";
            if (Auth::check()) {
                $uid =  Auth::user()->id;
                $check = $user->where('user_id', $uid)->get();
                if (count($check) > 0) {
                    $r['join'] = "LEAVE";
                }
            }

            // dd($check);


            $r["posts"] = $posts;

            $room[$key] = $r;
        }


        $data = [
            'room' => $room,
            'topics' => \App\Forum_topics::all()
        ];

        // dd($data['room'][0]['total_user']);

        return $data;
    }

    public function storeRoom(Request $request)
    {
        $data = [];
        if ($request->hasFile('img')) {
            $data = [
                'title' => $request->title,
                'sub_title' => $request->sub_title,
                'img' => $request->img->store('uploads/forum/room-thumbnail'),
                'topics_id' => $request->topics_id
            ];

            if (Forum_rooms::create($data)) {
                flash(__('Room created successfully'))->success();
            } else {
                flash(__('Crate room failed, no image selected'))->danger();
            }
        }
        return redirect()->back();
    }

    public function updateRoom(Request $request)
    {
        $room = Forum_rooms::find($request->id);
        $room->title = $request->title;
        $room->sub_title = $request->sub_title;
        $room->topics_id = $request->topics_id;
        if ($request->hasFile('img')) {
            $room->img = $request->img->store('uploads/forum/room-thumbnail');
            $link = public_path() . '/' . $request->old_image;
            if (file_exists($link)) {
                unlink($link);
            }
        }
        if ($room->save()) {
            flash(__('Room updated successfully'))->success();
        }
        return redirect()->back();
    }

    public function reply_forum(Request $request)
    {
        // dd($request->notifemail != "0");
        $reply['post_id'] = $request->post_id;
        $reply['text'] = $request->text;
        $reply['user_id'] = $request->user_id;
        $reply['notifiable'] = 1;
        $data = \App\Forum_Post_reply::create($reply);
        $cmtid = $data->id;
        // $judul = Forum::where("id", $request->post_id)->first()->title;
        // $balasan = $request->text;
        if ($data) {
            if (isset($request->precom)) {
                # code...
                foreach ($request->precom as $key => $v) {
                    \App\forum_produk_rekomendasi_balasan::create(["reply_id" => $data->id, "product_id" => $v]);
                }
            }

            // $this->sendEmail($judul,$balasan);
            if ($request->notifemail != "0") {
                $fne = [
                    'post_id' => 0,
                    'comment_id' => $cmtid,
                    'user_id' => Auth::user()->id
                ];

                \App\forum_notif_email::create($fne);
            }

            return 'berhasil';
        }
        return 'gagal';
    }

    public function fetch_reply($id)
    {
        $data = \App\Forum_Post_reply::where('post_id', $id)->with(['user', 'rekomendasi', 'rekomendasi.product'])
            ->orderBy('created_at', 'desc')
            ->get();
        return $data;
    }

    public function fetch_post($id)
    {

        $data = Forum::where('id', $id)->with(["user", "user.user_tier", "reply", "reply.user", "reply.user.user_tier", "reply.rekomendasi.product", "like", "seen"])->first();
        $diff = date_diff(date_create($data->updated_at), date_create());
        if ($diff->h < 24) {
            $data["updated"] = $diff->h . " jam";
        } elseif ($diff->s < 60) {
            $data["updated"] = $diff->s . " detik";
        } elseif ($diff->i < 60) {
            $data["updated"] = $diff->i . " menit";
        } elseif ($diff->d < 30) {
            $data["updated"] = $diff->d . " hari";
        } elseif ($diff->m < 12) {
            $data["updated"] = $diff->m . " bulan";
        } else {
            $data["updated"] = $diff->y . " tahun";
        }
        return $data;
    }

    public function get_post($id)
    {
        $post = Forum::where('id', $id)->with(['room', "user", "reply", "reply.user", "reply.rekomendasi.product", "like", "seen"])->first();

        return view('frontend.forum_ruang_detail_selengkapnya', compact('post'));
    }

    public function related_post($id, $room_id)
    {
        $data = Forum::where("room_id", $room_id)->with(["user", "user.membership", "room"])->where("id", "!=", $id)->limit(3)->get();
        return $data;
    }

    public function post_like(Request $request)
    {
        $data = [
            'user_id' => Auth::user()->id,
            'post_id' => $request->post_id
        ];

        if (Forum_like::create($data)) {
            return "oke";
        }
        return "gagall like coy";
    }

    public function comment_like(Request $request)
    {
        $data = [
            'reply_id' => $request->reply_id,
            'user_id' => Auth::user()->id
        ];
        $insert = forum_comment_like::create($data);
        if ($insert) {
            return "oke";
        }
        return "gagall coy";
    }

    public function comment_unlike(Request $request)
    {
        $data = [
            'reply_id' => $request->reply_id,
            'user_id' => Auth::user()->id
        ];

        if (forum_comment_like::where(['user_id' => Auth::user()->id, 'reply_id' => $request->reply_id])->delete()) {
            return "oke";
        }
        return "gagall unlike coy";
    }

    public function unlike(Request $request)
    {
        $data = [
            'post_id' => $request->post_id,
            'user_id' => $request->user_id
        ];

        if (Forum_like::where(['user_id' => $request->user_id, 'post_id' => $request->post_id])->delete()) {
            return "oke";
        }
        return "gagall unlike coy";
    }

    public function create_post(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'user_id' => 'required',
            'room_id' => 'required',
            'thumbnail' => 'required'
        ]);


        $data = [
            'title' => $request->title,
            'text' => $request->text,
            'user_id' => $request->user_id,
            'room_id' => $request->room_id
        ];

        $msg = [];

        if ($request->hasFile('thumbnail')) {
            $data["thumbnail"] = $request->thumbnail->store('uploads/forum/post/thumbnail');
            ImageOptimizer::optimize(base_path('public/') . $data["thumbnail"]);
            $msg['p'] = "upload success";
        }
        $forum = Forum::create($data);
        // $postId = $forum->id;
        if ($forum) {
            $id = $forum->id;
            if (isset($request->precom)) {
                foreach ($request->precom as $key => $value) {
                    \App\forum_produk_rekomendasi::create(["post_id" => $id, "product_id" => $value]);
                }
            }
            $msg['db'] = "success";
            $fne = [
                'post_id' => $id,
                'comment_id' => 0,
                'user_id' => Auth::user()->id
            ];

            if ($request->notifemail) {
                \App\forum_notif_email::create($fne);
            }
            return $msg;
        }
        $msg['fail'] = "gagal";
        return $msg;
    }



    public function join_room(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'room_id' => $request->room_id
        ];

        $store = \App\Forum_user_room::create($data);
        if ($store) {
            return "success";
        }
        return "failed";
    }
    public function leave_room(Request $request)
    {
        $data = [
            'user_id' => $request->user_id,
            'room_id' => $request->room_id
        ];

        $delete = \App\Forum_user_room::where($data)->delete();
        if ($delete) {
            return "success";
        }
        return "failed";
    }

    public function getReply($id)
    {
        $reply = \App\Forum_Post_reply::where("id", $id)->with(["like", "comment", "comment.user", "post", 'rekomendasi', 'rekomendasi.product'])->first();
        $like = $reply->like->pluck("user_id");
        // dd($like);
        $reply["check"] = "";
        $reply["totallike"] = count($like);
        $reply["totalcomment"] = count($reply->comment->pluck("user_id"));
        if (Auth::check()) {
            if (in_array(Auth::user()->id, $like->toArray())) {
                $reply["check"] = "liked";
            }
            // dd([$like,Auth::user()->id]);
        }
        return $reply;
    }

    public function sendEmail($judul, $balasan)
    {
        $target = \App\forum_notif_email::all()->pluck("user_id")->toArray();
        $target = \App\User::whereIn('id', $target)->where("email", "!=", null)->get()->pluck("email")->toArray();
        if (($key = array_search(Auth::user()->email, $target)) !== false) {
            unset($target[$key]);
        }
        $data = ["judul" => $judul, "nama" => Auth::user()->name, "balasan" => $balasan];
        Mail::to($target)->send(new forumNotifEmail($data));

        return "Email telah dikirim";
    }

    public function adduserNotif($postid)
    {
        \App\forum_notif_email::create(["post_id" => $postid, "user_id" => Auth::user()->id]);
        return "user notifiable";
    }

    public function product_recom(Request $request)
    {
        $products = new \App\Product;
        // return gettype($request->product)." ".$request->product;
        if ($request->product != "null") {
            $pr = json_decode($request->product);
            // dd(gettype($pr));
            if (count($pr) > 0) {
                $products = $products->whereIn('id', $pr);
                $product = filter_products($products->with('brand')->orderBy('num_of_sale', 'desc'))->limit(20)->get();
                $products = collect(collect($product))->chunk(4);
                $products_mobile = collect(collect($product))->chunk(2);
                // dd($products);
                return view('frontend.partials.best_sell_section', ['products' => $products, 'products_mobile' => $products_mobile, 'localpride' => 0]);
            }
        }
        return "";
    }

    public function add_comment_reply(Request $request)
    {
        $id = $request->idr;
        $isi = $request->isi;
        $in = \App\forum_comment_reply::create(['reply_id' => $id, "user_id" => Auth::user()->id, 'isi' => $isi, 'notifiable' => 1]);

        if ($in) {
            return "sukses";
        }
    }
}
