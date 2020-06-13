<?php

namespace App\Http\Controllers;

use App\ForumTag;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ForumTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forumtags = ForumTag::paginate(5);
        return view('backend.forum.tag.index', compact('forumtags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.forum.tag.create');
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
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Nama Tag Tidak Boleh Kosong',
            'name.min' => 'Nama Tag Minimal 3 Karakter'
        ];

        $request->validate($rules, $messages);

        ForumTag::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ]);

        return redirect('/forumtag')->with('success', 'Tag Berhasil Ditambahkan !');
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
        $forumtags = ForumTag::findorfail($id);
        return view('backend.forum.tag.edit', compact('forumtags'));
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
            'name' => 'required|min:3'
        ];

        $messages = [
            'name.required' => 'Nama Tag Tidak Boleh Kosong',
            'name.min' => 'Nama Tag Minimal 3 Karakter'
        ];

        $request->validate($rules, $messages);

        $tag_data = [
            'name' => $request->name,
            'slug' => Str::slug($request->name)
        ];

        ForumTag::whereId($id)->update($tag_data);

        return redirect('/forumtag')->with('success', 'Tag Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $forumtags = ForumTag::findorfail($id);
        $forumtags->delete();

        return redirect('/forumtag')->with('success', 'Tag Berhasil Dihapus !');
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

        $forumtags = ForumTag::where('name', $request->search)->orWhere('name', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.forum.tag.index', compact('forumtags'));
    }
}
