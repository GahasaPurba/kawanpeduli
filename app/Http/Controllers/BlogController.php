<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BlogController extends Controller
{
    public function blog(Post $posts)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/qhlOkClhWyZSmpDD');
        $instagram = $response->json();
        $posts = Post::orderBy('created_at', 'desc')->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('instagram', 'posts', 'data', 'categories', 'tags'));
    }

    public function singleblog(Post $posts, $slug)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/qhlOkClhWyZSmpDD');
        $instagram = $response->json();
        $data = Post::where('slug', $slug)->get();
        $post = Post::where('slug', $slug)->firstOrFail();
        $previous = Post::where('id', '<', $post->id)->orderBy('id', 'desc')->first();
        $next = Post::where('id', '>', $post->id)->orderBy('id', 'asc')->first();
        $posts = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.single', compact('instagram', 'data', 'previous', 'next', 'posts', 'categories', 'tags'));
    }

    public function category(Category $category)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/qhlOkClhWyZSmpDD');
        $instagram = $response->json();
        $posts = $category->post()->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('instagram', 'posts', 'data', 'categories', 'tags'));
    }

    public function tag(Tag $tag)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/qhlOkClhWyZSmpDD');
        $instagram = $response->json();
        $posts = $tag->post()->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('instagram', 'posts', 'data', 'categories', 'tags'));
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

        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/qhlOkClhWyZSmpDD');
        $instagram = $response->json();
        $posts = Post::where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->paginate(3);
        $data = Post::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = Category::all();
        $tags = Tag::all();
        return view('frontend.blog.index', compact('instagram', 'posts', 'data', 'categories', 'tags'));
    }
}
