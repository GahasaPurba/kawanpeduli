<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class StatistikController extends Controller
{
    public function index()
    {
        $response1 = Http::get('https://api.kawalcorona.com/indonesia');
        $dataindonesia = $response1->json();

        $response2 = Http::get('https://api.kawalcorona.com/indonesia/provinsi');
        $dataindonesiaprovinsi = $response2->json();

        $response3 = Http::get('https://api.kawalcorona.com/positif');
        $dataglobalpositif = $response3->json();

        $response4 = Http::get('https://api.kawalcorona.com/sembuh');
        $dataglobalsembuh = $response4->json();

        $response5 = Http::get('https://api.kawalcorona.com/meninggal');
        $dataglobalmeninggal = $response5->json();

        $response6 = Http::get('https://api.kawalcorona.com/');
        $dataglobalnegara = $response6->json();

        return view('frontend.statistik.index', compact('dataindonesia', 'dataindonesiaprovinsi', 'dataglobalpositif', 'dataglobalsembuh', 'dataglobalmeninggal', 'dataglobalnegara'));
    }
}
