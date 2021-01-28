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
        $discussions = Discussion::orderBy('created_at', 'desc')->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('discussions', 'data', 'categories', 'tags'));
    }

    public function singleforum(Discussion $discussions, $slug)
    {
        $data = Discussion::where('slug', $slug)->get();
        $discussion = Discussion::where('slug', $slug)->firstOrFail();
        $previous = Discussion::where('id', '<', $discussion->id)->orderBy('id', 'desc')->first();
        $next = Discussion::where('id', '>', $discussion->id)->orderBy('id', 'asc')->first();
        $discussions = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.single', compact('data', 'previous', 'next', 'discussions', 'categories', 'tags'));
    }

    public function category(ForumCategory $category)
    {
        $discussions = $category->discussion()->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('discussions', 'data', 'categories', 'tags'));
    }

    public function tag(ForumTag $tag)
    {
        $discussions = $tag->discussion()->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('discussions', 'data', 'categories', 'tags'));
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

        $discussions = Discussion::where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->paginate(8);
        $data = Discussion::orderBy('created_at', 'desc')->limit(4)->get();
        $categories = ForumCategory::all();
        $tags = ForumTag::all();
        return view('frontend.forum.index', compact('discussions', 'data', 'categories', 'tags'));
    }
}
