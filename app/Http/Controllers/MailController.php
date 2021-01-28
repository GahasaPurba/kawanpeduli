<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Mail\SubscriptionKawanPeduli;
use Illuminate\Http\Request;

class MailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mails = Mail::paginate(5);
        return view('backend.mail.index', compact('mails'));
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
        $rules = [
            'email' => 'required|email|unique:mails'
        ];

        $messages = [
            'email.required' => 'Email Tidak Boleh Kosong',
            'email.email' => 'Isi Email Dengan Format Email Yang Benar',
            'email.unique' => 'Anda Sudah Berlangganan Di Website Ini',
        ];

        $request->validate($rules, $messages);

        Mail::create([
            'email' => $request->email,
        ]);

        \Mail::to($request->email)->send(new SubscriptionKawanPeduli);

        return redirect()->back()->with('success', 'Terimakasih Telah Berlangganan,Tetap Nantikan Informasi-Informasi Dari Kami!');
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mails = Mail::findorfail($id);
        $mails->delete();

        return redirect('/mail')->with('success', 'Email Berhasil Dihapus !');
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

        $mails = Mail::where('email', $request->search)->orWhere('email', 'like', '%' . $request->search . '%')->paginate(5);
        return view('backend.mail.index', compact('mails'));
    }
}
