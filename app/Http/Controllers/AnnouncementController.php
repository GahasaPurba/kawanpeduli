<?php

namespace App\Http\Controllers;

use App\Announcement;
use Illuminate\Http\Request;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::paginate(5);
        return view('backend.announcement.index', compact('announcements'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.announcement.create');
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
            'title' => 'required|min:3',
            'content' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul Pengumuman Tidak Boleh Kosong',
            'content.required' => 'Konten Pengumuman Tidak Boleh Kosong',
            'title.min' => 'Judul Pengumuman Minimal 3 Karakter'
        ];

        $request->validate($rules, $messages);

        Announcement::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect('/announcement')->with('success', 'Pengumuman Berhasil Ditambahkan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $announcements = Announcement::findorfail($id);
        return view('backend.announcement.detail', compact('announcements'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $announcements = Announcement::findorfail($id);
        return view('backend.announcement.edit', compact('announcements'));
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
            'title' => 'required|min:3',
            'content' => 'required',
        ];

        $messages = [
            'title.required' => 'Judul Pengumuman Tidak Boleh Kosong',
            'content.required' => 'Konten Pengumuman Tidak Boleh Kosong',
            'title.min' => 'Judul Pengumuman Minimal 3 Karakter'
        ];

        $request->validate($rules, $messages);

        $announcement_data = [
            'title' => $request->title,
            'content' => $request->content,
        ];

        Announcement::whereId($id)->update($announcement_data);

        return redirect('/announcement')->with('success', 'Pengumuman Berhasil Diubah !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $announcements = Announcement::findorfail($id);
        $announcements->delete();

        return redirect('/announcement')->with('success', 'Pengumuman Berhasil Dihapus !');
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

        $announcements = Announcement::where('title', $request->search)->orWhere('title', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.announcement.index', compact('announcements'));
    }
}
