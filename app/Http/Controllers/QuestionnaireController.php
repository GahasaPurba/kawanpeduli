<?php

namespace App\Http\Controllers;

use App\Questionnaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class QuestionnaireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questionnaires = Questionnaire::paginate(5);
        return view('backend.kuesioner.index', compact('questionnaires'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('frontend.kuesioner.create');
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
            'question1' => 'required',
            'question2' => 'required',
            'question3' => 'required',
            'question4' => 'required',
            'suggestion' => 'required',
        ];

        $messages = [
            'question1.required' => 'Pilih Salah Satu Jawaban Kuesioner',
            'question2.required' => 'Pilih Salah Satu Jawaban Kuesioner',
            'question3.required' => 'Pilih Salah Satu Jawaban Kuesioner',
            'question4.required' => 'Pilih Salah Satu Jawaban Kuesioner',
            'suggestion.required' => 'Masukkan Saran Anda',
        ];

        $request->validate($rules, $messages);

        Questionnaire::create([
            'user_id' => FacadesAuth::id(),
            'question1' => $request->question1,
            'question2' => $request->question2,
            'question3' => $request->question3,
            'question4' => $request->question4,
            'suggestion' => $request->suggestion,
        ]);

        return redirect('/')->with('success', 'Terimakasih Atas Feedback Yang Anda Berikan !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaires = Questionnaire::findorfail($id);
        return view('backend.kuesioner.detail', compact('questionnaires'));
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
        $questionnaires = Questionnaire::findorfail($id);
        $questionnaires->delete();

        return redirect('/questionnaire')->with('success', 'Kuesioner Berhasil Dihapus !');
    }
}
