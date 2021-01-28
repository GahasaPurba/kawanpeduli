<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class BerandaController extends Controller
{
    public function index(Post $posts)
    {
        $data = $posts->orderBy('created_at', 'desc')->limit(3)->get();
        $response = Http::get('https://api.kawalcorona.com/indonesia');
        $dataindonesia = $response->json();
        return view('frontend', compact('data', 'dataindonesia'));
    }
}
