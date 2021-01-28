<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use App\Exports\PostsExport;
use App\Tag;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (FacadesAuth::user()->role == 'Admin') {
            $posts = Post::paginate(5);
        } else if (FacadesAuth::user()->role == 'Author') {
            $posts = Post::where('user_id', FacadesAuth::user()->id)->paginate(5);
        }
        return view('backend.blog.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('backend.blog.post.create', compact('categories', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'category_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'content' => 'required',
            'quote' => 'required',
            'thumbnail' => 'required|image',
        ];

        $messages = [
            'category_id.required' => 'Pilih Salah Satu Kategori Postingan',
            'tag_id.required' => 'Pilih Minimal Satu Tag Postingan',
            'title.required' => 'Judul Postingan Tidak Boleh Kosong',
            'content.required' => 'Konten Postingan Tidak Boleh Kosong',
            'quote.required' => 'Quote Postingan Tidak Boleh Kosong',
            'thumbnail.required' => 'Thumbnail Postingan Tidak Boleh Kosong',
            'thumbnail.image' => 'Thumbnail Postingan Harus Berformat Image (jpeg, png, bmp, gif, svg, atau webp)',
        ];

        $request->validate($rules, $messages);

        $thumbnail = $request->thumbnail;
        $new_thumbnail = time() . $thumbnail->getClientOriginalName();
        $thumbnail->move('upload/thumbnail/', $new_thumbnail);

        $post = Post::create([
            'category_id' => $request->category_id,
            'user_id' => FacadesAuth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'content' => $request->content,
            'quote' => $request->quote,
            'thumbnail' => $new_thumbnail,
        ]);

        $post->tag()->attach($request->tag_id);

        return redirect('/post')->with('success', 'Postingan Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::findorfail($id);
        return view('backend.blog.post.edit', compact('posts', 'categories', 'tags'));
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
        if ($request->hasFile('thumbnail')) {
            $rules = [
                'category_id' => 'required',
                'tag_id' => 'required',
                'title' => 'required',
                'content' => 'required',
                'quote' => 'required',
                'thumbnail' => 'image',
            ];

            $messages = [
                'category_id.required' => 'Pilih Salah Satu Kategori Postingan',
                'tag_id.required' => 'Pilih Minimal Satu Tag Postingan',
                'title.required' => 'Judul Postingan Tidak Boleh Kosong',
                'content.required' => 'Konten Postingan Tidak Boleh Kosong',
                'quote.required' => 'Quote Postingan Tidak Boleh Kosong',
                'thumbnail.image' => 'Thumbnail Postingan Harus Berformat Image (jpeg, png, bmp, gif, svg, atau webp)',
            ];
        } else {
            $rules = [
                'category_id' => 'required',
                'tag_id' => 'required',
                'title' => 'required',
                'content' => 'required',
                'quote' => 'required',
            ];

            $messages = [
                'category_id.required' => 'Pilih Salah Satu Kategori Postingan',
                'tag_id.required' => 'Pilih Minimal Satu Tag Postingan',
                'title.required' => 'Judul Postingan Tidak Boleh Kosong',
                'content.required' => 'Konten Postingan Tidak Boleh Kosong',
                'quote.required' => 'Quote Postingan Tidak Boleh Kosong',
            ];
        }

        $request->validate($rules, $messages);

        $posts = Post::findorfail($id);

        if ($request->hasFile('thumbnail')) {
            $thumbnail = $request->thumbnail;
            $new_thumbnail = time() . $thumbnail->getClientOriginalName();
            $thumbnail->move('upload/thumbnail/', $new_thumbnail);

            $post_data = [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'quote' => $request->quote,
                'thumbnail' => $new_thumbnail,
            ];
        } else {
            $post_data = [
                'category_id' => $request->category_id,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'quote' => $request->quote,
            ];
        }

        $posts->tag()->sync($request->tag_id);

        $posts->update($post_data);

        return redirect('/post')->with('success', 'Postingan Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Post::findorfail($id);
        $posts->delete();

        if (FacadesAuth::user()->role == 'Admin') {
            return redirect('/post')->with('success', 'Postingan Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
        } else if (FacadesAuth::user()->role == 'Author') {
            return redirect('/post')->with('success', 'Postingan Berhasil Dihapus !');
        }
    }

    public function search(Request $request)
    {
        $rules = [
            'search' => 'required'
        ];

        $messages = [
            'search.required' => 'Kata Kunci Pencarian Tidak Boleh Kosong',
        ];

        $request->validate($rules, $messages);

        $posts = Post::where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.blog.post.index', compact('posts'));
    }

    public function excel()
    {
        return Excel::download(new PostsExport, 'ListPostingan.xlsx');
    }

    public function pdf()
    {
        $posts = Post::all();

        $pdf = PDF::loadView('backend.blog.post.pdf', compact('posts'));
        return $pdf->download('ListPostingan.pdf');
    }

    public function trash()
    {
        if (FacadesAuth::user()->role == 'Admin') {
            $posts = Post::onlyTrashed()->paginate(5);
        } else if (FacadesAuth::user()->role == 'Author') {
            $posts = Post::onlyTrashed()->where('user_id', FacadesAuth::user()->id)->paginate(5);
        }

        return view('backend.blog.post.trash', compact('posts'));
    }

    public function restore($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->restore();

        return redirect()->back()->with('success', 'Postingan Berhasil Direstore !');
    }

    public function kill($id)
    {
        $posts = Post::withTrashed()->where('id', $id)->first();
        $posts->forceDelete();
        $posts->tag()->detach();
        Storage::delete($posts->thumbnail);

        return redirect()->back()->with('success', 'Postingan Berhasil Dihapus Permanen !');
    }
}
