<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\ForumCategory;
use App\ForumTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ForumController extends Controller
{
    public function forum(Discussion $discussions)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/ufudyNGmtpJIpdTA');
        $instagram = $response->json();
        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('instagram', 'discussions', 'data', 'categories', 'tags'));
    }

    public function singleforum(Discussion $discussions, $slug)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/ufudyNGmtpJIpdTA');
        $instagram = $response->json();
        $data = Discussion::where('slug', $slug)->get();
        $discussion = Discussion::where('slug', $slug)->firstOrFail();
        $previous = Discussion::where('id', '<', $discussion->id)->orderBy('id', 'desc')->first();
        $next = Discussion::where('id', '>', $discussion->id)->orderBy('id', 'asc')->first();
        $discussions = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.single', compact('instagram', 'data', 'previous', 'next', 'discussions', 'categories', 'tags'));
    }

    public function category(ForumCategory $category)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/ufudyNGmtpJIpdTA');
        $instagram = $response->json();
        $discussions = $category->discussion()->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('instagram', 'discussions', 'data', 'categories', 'tags'));
    }

    public function tag(ForumTag $tag)
    {
        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/ufudyNGmtpJIpdTA');
        $instagram = $response->json();
        $discussions = $tag->discussion()->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('instagram', 'discussions', 'data', 'categories', 'tags'));
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

        $response = Http::get('https://v1.nocodeapi.com/kawanpeduli/instagram/ufudyNGmtpJIpdTA');
        $instagram = $response->json();
        $discussions = Discussion::where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('instagram', 'discussions', 'data', 'categories', 'tags'));
    }
}
