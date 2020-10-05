<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\blog;
use App\categoryblog;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($all)
    {
        $blogs = blog::with('category')->orderBy('created_at', 'desc');
        if ($all == "six") {
            $blogs = $blogs->limit(6);
        }

        // Album::with('images')->get()
        return json_encode($blogs->get());
    }

    public function landingpage()
    {
        $blog = blog::where('showblog', 1)->with('category')->get();
        $collect = collect($blog);
        $chunk = $collect->chunk(3);
        $chunks = $collect->chunk(1);
        $sectBlog = $chunk->toArray();
        $sectBlogMobile = $chunks->toArray();

        // dd($sectBlog);
        return view('frontend.partials.blog_section', compact(['sectBlog', 'sectBlogMobile']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = categoryblog::all();

        return view('blog/formblog', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!$request->show) {
            $request->show = 0;
        }

        $save = DB::table('blogs')->insert([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->writer,
            'showblog' => $request->show,
            'product_recommend' => json_encode($request->recommend),
            'categoryblog_id' => $request->category,
            'thumbnail' => $this->upload_image($request)
        ]);

        if ($save) {
            return redirect(route('admin.blog.manage'));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = blog::where('id', $id)->first();
        return view('frontend.artikel', compact(['blog', 'id']));
        // return view('frontend.blog');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = categoryblog::all();
        $blog = blog::where("id", $id)->first();
        if (json_decode($blog->product_recommend) != 0) {
            $blog["pr"] = json_decode($blog->product_recommend);
        }
        return view('blog/editblog', compact(['blog', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $img = $request->old_thumbnail;
        if ($request->hasFile('thumbnail')) {
            $name = $request->thumbnail->getClientOriginalName();
            $img = $this->upload_image($request);

            if ($name == $request->old_thumbnail) {
                $img = $request->old_thumbnail;
            }
        }
        // dd([$request->all(),$img]);

        $data = [
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => $request->writer,
            'showblog' => $request->show,
            'product_recommend' => json_encode($request->recommend),
            'categoryblog_id' => $request->category,
            'thumbnail' => $img
        ];

        if (blog::where('id', $id)->update($data)) {
            flash(__('Berhasil mengubah blog'))->success();
            return redirect('/admin/blog/manageblog');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }

    public function delete($id)
    {
        $blog = blog::where('id', $id);
        $iblog = $blog->first()->thumbnail;
        $path = public_path() . '/blog/thumbnail/' . $iblog;
        // dd($path);

        $detail = $blog->first()->content;
        $dom = new \DOMDocument();
        libxml_use_internal_errors(true);
        $dom->loadHtml($detail, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
        $images = $dom->getElementsByTagName('img');
        // dd($images);

        foreach ($images as $img) {
            $src = public_path() . '/' . $img->getAttribute('src');
            if (file_exists($src)) {
                unlink($src);
            }
        }

        $blog = $blog->delete();
        if ($blog) {
            if (file_exists($path)) {
                if (unlink($path)) {
                    return redirect()->back();
                }
            }
        }
        return redirect()->back();
    }

    public function upload_image(Request $request)
    {
        $file = '';
        if ($request->hasFile('thumbnail')) {
            $file = $request->thumbnail;
            $name   = $file->getClientOriginalName();
            if ($file->move(\base_path() . "/public/blog/thumbnail", $name)) {
                return $name;
            }
            return 'default.jpg';
        }
    }

    public function manageBlog()
    {
        $blog = blog::with('user')->get();
        return view('blog/manage', compact('blog'));
    }

    public function showhide(Request $request)
    {
        $data = DB::table('blogs')
            ->where('id', $request->id)
            ->update(['showblog' => $request->sb]);
        if ($data) {
            return redirect()->back();
        }
    }

    public function filter($id, $other)
    {
        $other = json_decode($other);
        $blog = blog::where("categoryblog_id", $id)->with(['category', 'user'])->whereNotIn('id', $other)->orderBy('created_at', 'desc')->limit(6)->get();
        return json_encode($blog);
    }

    public function upload_ajx(Request $request)
    {
        $img = $request->file('image')->store('blog/gambar');

        return response()->json([
            'image' => asset($img)
        ]);
    }

    public function remove_ajx(Request $request)
    {
        $src = public_path() . '/' . $request->src;
        if (unlink($src)) {
            return response()->json('oke');
        }
    }

    public function add_ctg(Request $request)
    {
        $icon = "placeholder-rect.jpg";
        if ($request->hasFile('icon')) {
            $image = $request->file('icon');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/blog'), $new_name);
            $icon = $new_name;
        }
        $data = [
            "title" => $request->title,
            "icon" => $icon
        ];
        $ctg = categoryblog::insert($data);
        if ($ctg) {
            flash("berhasil menambah kategori blog")->success();
            return "success";
        }
    }

    public function delete_ctg($id)
    {
        $id = explode(",", $id);
        $ctg = categoryblog::whereIn('id', $id);
        if ($ctg->get() != null) {
            foreach ($ctg->get() as $key => $cb) {
                $src = public_path() . '/frontend/images/blog/' . $cb->icon;
                categoryblog::find($cb->id)->delete();
                if (is_file($src)) {
                    unlink($src);
                }
            }
            flash("berhasil menghapus kategori blog")->success();
            return "deleted";
        }
    }

    public function edit_ctg($id)
    {
        $ctg = categoryblog::where("id", $id)->first();
        return $ctg;
    }
    public function update_ctg(Request $request)
    {
        $id = $request->id;
        $data["icon"] = $request->old_image;

        if ($request->hasFile("icon")) {
            $image = $request->file('icon');
            $new_name = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('frontend/images/blog'), $new_name);
            $delsrc = public_path() . '/frontend/images/blog/' . $request->old_image;
            if (is_file($delsrc)) {
                unlink($delsrc);
            }
            $data["icon"] = $new_name;
        }

        $data["title"] = $request->title;
        categoryblog::where("id", $id)->update($data);
        flash("berhasil update kategori blog")->success();
        return "success";
    }

    public function ctg_name($ctgblog)
    {
        $ctgname = DB::table('categoryblog')->where('title', $ctgblog)->first();

        if (isset($ctgname)) {
            return "exist";
        }
        return "available";
    }
}
