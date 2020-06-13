@extends('frontend.template.master')

@section('title', 'Beranda')

@section('content')

<section class="banner_part">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 offset-lg-1 col-sm-8 offset-sm-2">
                <div class="banner_text aling-items-center">
                    <div class="banner_text_iner">
                        @if (Auth::check())
                        <h5>Halo, {{ Auth::user()->name }} !<br><br>
                            Selamat Datang di</h5><br>
                        @else
                        <h5>Halo !<br><br>
                            Selamat Datang di</h5><br>
                        @endif
                        <h2>Kawan<br>
                            Peduli</h2>
                        <p>Dari Kita, Untuk #IndonesiaBebasCorona.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="about_part section-padding">
    <div class="container">
        <div class="row">
            <div class="section_tittle">
                <h2><span>Corona</span> di Indonesia</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="about_img">
                    <img alt="Achmad Yurianto" src="frontend/img/about.png">
                </div>
            </div>
            <div class="offset-lg-1 col-lg-5 col-sm-8 col-md-6">
                <div class="about_text">
                    <h2>Bersama Kita Lawan
                        COVID-19 Untuk <span>#IndonesiaBebasCorona.</span></h2>
                    <p class="text-justify">
                        Di Website Ini Tersedia Data Akurat COVID-19 Di Indonesia Maupun Global.
                        Data Ini Kami Peroleh Dari Berbagai Sumber Terpercaya.
                        Berikut Kami Tampilkan Sekilas Data COVID-19 Di Indonesia.
                        Untuk Melihat Detail Statistik, Klik Tombol Dibawah.
                    </p>
                    <a href="{{ route('statistik') }}" class="btn_1">Detail Statistik</a>
                    <div class="about_part_counter">
                        @foreach($dataindonesia as $dataindo)
                        <div class="single_counter text-center">
                            <span class="counter text-primary">{{ $dataindo['positif'] }}</span>
                            <p>Positif</p>
                        </div>
                        <div class="single_counter text-center">
                            <span class="counter text-success">{{ $dataindo['sembuh'] }}</span>
                            <p>Sembuh</p>
                        </div>
                        <div class="single_counter text-center">
                            <span class="counter text-danger">{{ $dataindo['meninggal'] }}</span>
                            <p>Meninggal</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="service_part padding_bottom">
    <div class="container">
        <div class="row justify-content-between align-items-center">
            <div class="col-lg-4 col-sm-10">
                <div class="section_tittle">
                    <h2>Forum <span>Diskusi</span></h2>
                </div>
                <div class="service_text">
                    <h2>Temukan Berbagai Diskusi
                        Mengenai <span> COVID-19.</span></h2>
                    <p class="text-justify">
                        Dalam Forum Diskusi, Kamu Bisa Memberikan Pengetahuan Atau Pertanyaan Seputar COVID-19.
                        Nantinya Semua Orang Dapat Memberikan Pesan, Komentar, Ataupun Jawaban, Di Kolom Diskusi Yang Tersedia.
                        Dengan Begini, Akan Lebih Banyak Orang Dapat Mengetahui Lebih Dalam Tentang COVID-19.
                    </p>
                    <a href="{{ route('forum') }}" class="btn_1">Gabung Ke Forum</a>
                </div>
            </div>
            <div class="col-lg-7 col-xl-6">
                <div class="service_part_iner">
                    <div class="row">
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_service_text ">
                                <img alt="Pakai Sabun" width="70" src="frontend/img/icon/service_1.svg">
                                <h4>Pakai Sabun</h4>
                                <p class="text-justify">
                                    Jangan Lupa Cuci Tangan ! Dengan Menggunakan Sabun, Virus dan Kuman Pasti Akan Hilang
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_service_text">
                                <img alt="Pakai Hand Sanitizer" width="70" src="frontend/img/icon/service_2.svg">
                                <h4>Pakai Hand Sanitizer</h4>
                                <p class="text-justify">
                                    Apabila Di Luar Rumah, Hand Sanitizer Juga Bisa Dijadikan Alternatif
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_service_text">
                                <img alt="Cara Yang Benar" width="70" src="frontend/img/icon/service_3.svg">
                                <h4>Cara Yang Benar</h4>
                                <p class="text-justify">
                                    Cuci Tanganmu Dengan Benar, Pastikan Semua Bagian Tangan Terkena Sabun
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6">
                            <div class="single_service_text">
                                <img alt="Terhindar Dari Virus" width="70" src="frontend/img/icon/service_4.svg">
                                <h4>Terhindar Dari Virus</h4>
                                <p class="text-justify">
                                    Dengan Mencuci Tangan, Akhirnya Kitapun Dapat Terhindar Dari COVID-19
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="blog_part padding_bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-lg-5">
                <div class="blog_part_tittle">
                    <h2>Blog <span>Terbaru</span> </h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            @foreach($data as $post_terbaru)
            <div class="col-lg-4">
                <div class="single_blog">
                    <div class="appartment_img">
                        <img alt="Thumbnail" src="{{ asset('upload/thumbnail/' . $post_terbaru->thumbnail) }}">
                    </div>
                    <div class="single_appartment_content" style="min-height:300px">
                        <p><a href="#">{{ $post_terbaru->user->name }}</a> / {{ $post_terbaru->created_at->diffForHumans() }}</p>
                        <a href="{{ route('singleblog', $post_terbaru->slug) }}">
                            <h4>{{ $post_terbaru->title }}</h4>
                        </a>
                        <ul class="list-unstyled">
                            <li><a href="#"><span class="ti-link"></span></a> {{ $post_terbaru->category->name }}</li> <br>
                            <li><a href="#"><span class="ti-comment"></span></a> {{ $post_terbaru->comments->count() }} Komentar</li> <br>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <div class="form-group">
                <br>
                <a href="{{ route('blog') }}" class="btn btn-outline-dark">Lihat Semua Blog</a>
            </div>
        </div>
    </div>
</div>

@endsection
