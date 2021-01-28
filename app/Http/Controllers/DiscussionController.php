<?php

namespace App\Http\Controllers;

use App\Discussion;
use App\ForumCategory;
use App\ForumTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class DiscussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'Admin') {
            $discussions = Discussion::paginate(5);
        } else if (Auth::user()->role == 'Author' || Auth::user()->role == 'User') {
            $discussions = Discussion::where('user_id', Auth::user()->id)->paginate(5);
        }
        return view('backend.forum.discussion.index', compact('discussions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = ForumTag::all();
        $categories = ForumCategory::all();
        return view('backend.forum.discussion.create', compact('categories', 'tags'));
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
            'forum_category_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'forum_category_id.required' => 'Pilih Salah Satu Kategori Diskusi',
            'tag_id.required' => 'Pilih Minimal Satu Tag Diskusi',
            'title.required' => 'Judul Diskusi Tidak Boleh Kosong',
            'description.required' => 'Deskripsi Diskusi Tidak Boleh Kosong',
        ];

        $request->validate($rules, $messages);

        $discussion = Discussion::create([
            'forum_category_id' => $request->forum_category_id,
            'user_id' => Auth::id(),
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
        ]);

        $discussion->tag()->attach($request->tag_id);

        return redirect('/discussion')->with('success', 'Diskusi Berhasil Ditambahkan !');
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
        $tags = ForumTag::all();
        $categories = ForumCategory::all();
        $discussions = Discussion::findorfail($id);
        return view('backend.forum.discussion.edit', compact('discussions', 'categories', 'tags'));
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
        $rules = [
            'forum_category_id' => 'required',
            'tag_id' => 'required',
            'title' => 'required',
            'description' => 'required',
        ];

        $messages = [
            'forum_category_id.required' => 'Pilih Salah Satu Kategori Diskusi',
            'tag_id.required' => 'Pilih Minimal Satu Tag Diskusi',
            'title.required' => 'Judul Diskusi Tidak Boleh Kosong',
            'description.required' => 'Deskripsi Diskusi Tidak Boleh Kosong',
        ];

        $request->validate($rules, $messages);

        $discussions = Discussion::findorfail($id);

        $discussion_data = [
            'forum_category_id' => $request->forum_category_id,
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'description' => $request->description,
        ];

        $discussions->tag()->sync($request->tag_id);

        $discussions->update($discussion_data);

        return redirect('/discussion')->with('success', 'Diskusi Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $discussions = Discussion::findorfail($id);
        $discussions->delete();

        if (Auth::user()->role == 'Admin') {
            return redirect('/discussion')->with('success', 'Diskusi Berhasil Dihapus ! (Untuk Merestore Silahkan Cek Trash)');
        } else if (Auth::user()->role == 'Author' || Auth::user()->role == 'User') {
            return redirect('/discussion')->with('success', 'Diskusi Berhasil Dihapus !');
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

        $discussions = Discussion::where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.forum.discussion.index', compact('discussions'));
    }

    public function trash()
    {
        if (Auth::user()->role == 'Admin') {
            $discussions = Discussion::onlyTrashed()->paginate(5);
        } else if (Auth::user()->role == 'Author' || Auth::user()->role == 'User') {
            $discussions = Discussion::onlyTrashed()->where('user_id', Auth::user()->id)->paginate(5);
        }

        return view('backend.forum.discussion.trash', compact('discussions'));
    }

    public function restore($id)
    {
        $discussions = Discussion::withTrashed()->where('id', $id)->first();
        $discussions->restore();

        return redirect()->back()->with('success', 'Diskusi Berhasil Direstore !');
    }

    public function kill($id)
    {
        $discussions = Discussion::withTrashed()->where('id', $id)->first();
        $discussions->forceDelete();
        $discussions->tag()->detach();

        return redirect()->back()->with('success', 'Diskusi Berhasil Dihapus Permanen !');
    }
}
