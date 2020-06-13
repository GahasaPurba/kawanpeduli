<?php

namespace App\Http\Controllers;

use App\Category;
use App\Discussion;
use App\ForumCategory;
use App\ForumTag;
use App\Post;
use App\Tag;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $authors = User::where('role', 'Author')->count();
        $users = User::where('role', 'User')->count();
        $posts = Post::orderBy('created_at', 'desc')->limit(5)->get();
        $discussions = Discussion::orderBy('created_at', 'desc')->limit(5)->get();
        $jumlahpost = Post::count();
        $jumlahdiscussion = Discussion::count();
        return view('backend', compact('authors', 'users', 'posts', 'discussions', 'jumlahpost', 'jumlahdiscussion'));
    }

    public function editpost($id)
    {
        $tags = Tag::all();
        $categories = Category::all();
        $posts = Post::findorfail($id);
        return view('backend.blog.post.edit', compact('posts', 'categories', 'tags'));
    }

    public function destroypost($id)
    {
        $posts = Post::findorfail($id);
        $posts->delete();

        return redirect('/home')->with('success', 'Postingan Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
    }

    public function editdiscussion($id)
    {
        $tags = ForumTag::all();
        $categories = ForumCategory::all();
        $discussions = Discussion::findorfail($id);
        return view('backend.forum.discussion.edit', compact('discussions', 'categories', 'tags'));
    }

    public function destroydiscussion($id)
    {
        $discussions = Discussion::findorfail($id);
        $discussions->delete();

        return redirect('/home')->with('success', 'Diskusi Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
    }
}
