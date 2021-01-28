@extends('frontend.template.master')

@section('title', 'Detail Blog')

@section('content')

<section class="breadcrumb blog_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Detail Blog</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog_area single-post-area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                @foreach($data as $singleblog)
                <div class="single-post">
                    <div class="feature-img">
                        <img alt="Thumbnail" class="img-fluid" src="{{ asset('upload/thumbnail/' . $singleblog->thumbnail) }}">
                    </div>
                    <div class="blog_details">
                        <h2>{{ $singleblog->title }}</h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="far fa-user"></i> {{ $singleblog->user->name }}</a></li>
                            <li><a href="#"><i class="far fa-calendar"></i> {{ $singleblog->created_at->format('d M Y') }}</a></li>
                            <li><a href="#"><i class="far fa-bookmark"></i> {{ $singleblog->category->name }}</a></li>
                            <li><a href="#"><i class="far fa-comments"></i> {{ $singleblog->comments->count() }} Komentar</a></li>
                        </ul>
                        <p>
                            {!! $singleblog->content !!}
                        </p>
                        <div class="quote-wrapper">
                            <div class="quotes">
                                {!! $singleblog->quote !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navigation-top">
                    <div class="d-sm-flex justify-content-between text-center">
                        <div class="col-sm-4 text-center my-2 my-sm-0">
                        </div>
                        <div class="addthis_inline_share_toolbox"></div>
                    </div>
                    <div class="navigation-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                @if ($previous)
                                <div class="thumb">
                                    <a href="{{ route('singleblog', $previous->slug) }}">
                                        <img alt="Thumbnail" class="img-fluid" width="100" src="{{ asset('upload/thumbnail/' . $previous->thumbnail) }}">
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="{{ route('singleblog', $previous->slug) }}">
                                        <span class="lnr text-white ti-arrow-left"></span>
                                    </a>
                                </div>
                                <div class="detials">
                                    <p>Post Sebelumnya</p>
                                    <a href="{{ route('singleblog', $previous->slug) }}">
                                        <h4>{{ $previous->title }}</h4>
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                @if ($next)
                                <div class="detials">
                                    <p>Post Selanjutnya</p>
                                    <a href="{{ route('singleblog', $next->slug) }}">
                                        <h4>{{ $next->title }}</h4>
                                    </a>
                                </div>
                                <div class="arrow">
                                    <a href="{{ route('singleblog', $next->slug) }}">
                                        <span class="lnr text-white ti-arrow-right"></span>
                                    </a>
                                </div>
                                <div class="thumb">
                                    <a href="{{ route('singleblog', $next->slug) }}">
                                        <img alt="Thumbnail" class="img-fluid" width="100" src="{{ asset('upload/thumbnail/' . $next->thumbnail) }}">
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="blog-author">
                    <div class="media align-items-center">
                        <img alt="Logo KawanPeduli" src="{{ asset('frontend/img/blog/author.png') }}">
                        <div class="media-body">
                            <a href="{{ url('/') }}">
                                <h4>KawanPeduli</h4>
                            </a>
                            <p class="text-justify">
                                KawanPeduli Adalah Sebuah Website Dari Indonesia Yang Digagas Oleh Tim SixteenCoder - KawanPeduli dari
                                Proyek Akhir Mata Kuliah PSW II Di Institut Teknologi Del. Website Ini Dibuat Untuk Menjadi Wadah Informasi dan Komunikasi
                                Bagi Masyarakat, Mengenai COVID-19 Yang Melanda Dunia Saat Ini. Semoga Dengan Adanya Website Ini Kita Semakin Kuat Untuk Memerangi Wabah Ini.
                                Terimakasih Telah Mengunjungi Website Ini, Semoga Website Ini Dapat Bermanfaat Bagi Banyak Orang.<br>
                                <b>#UntukIndonesiaBebasCorona</b>
                            </p>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    <h3><b>Kolom Komentar</b></h3>
                    <h4>{{ $singleblog->comments->count() }} Komentar</h4>
                    <p class="text-muted">Silahkan Berikan Komentar Anda Terhadap Postingan Ini, Pada Kolom Komentar Dibawah</p> <br>
                    @comments(['model' => $singleblog])
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @if (Auth::check() && Auth::user()->role == 'Admin' || Auth::check() && Auth::user()->role == 'Author')
                    <aside class="single_sidebar_widget search_widget">
                        <a href="{{ route('post.create') }}" class="text-center button rounded-0 primary-bg text-white w-100">Buat Post Baru</a>
                    </aside>
                    @endif
                    <aside class="single_sidebar_widget search_widget">
                        <form method="GET" action="{{ route('blogsearch') }}">
                            @csrf
                            <div class="form-group">
                                <div class="input-group mb-3">
                                    <input type="text" name="search" id="search" class="form-control @error('search') is-invalid @enderror placeholder hide-on-focus" placeholder="Masukkan Kata Kunci Judul" value="{{ old('search') }}">
                                    @error('search')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                    <div class="input-group-append">
                                        <button type="button" class="btn"><i class="ti-search"></i></button>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="button rounded-0 primary-bg text-white w-100">Cari</button>
                        </form>
                    </aside>
                    <aside class="single_sidebar_widget post_category_widget">
                        <h4 class="widget_title">Kategori</h4>
                        <ul class="list cat-list">
                            @foreach($categories as $category)
                            <li>
                                <a href="{{ route('blogcategory', $category->slug) }}" class="d-flex">
                                    <p>{{ $category->name }}</p>
                                    &nbsp;
                                    <p>({{ $category->post->count() }})</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Post Terbaru</h3>
                        @foreach($posts as $post)
                        <div class="media post_item">
                            <img alt="Thumbnail" class="img-fluid rounded" width="80" src="{{ asset('upload/thumbnail/' . $post->thumbnail) }}">
                            <div class="media-body">
                                <a href="{{ route('singleblog', $post->slug) }}">
                                    <h3>{{ Str::words($post->title, 4) }}</h3>
                                </a>
                                <p>{{ $post->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Kumpulan Tag</h4>
                        <ul class="list">
                            @foreach($tags as $tag)
                            <li>
                                <a href="{{ route('blogtag', $tag->slug) }}">{{ $tag->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    {{--
                    <aside class="single_sidebar_widget instagram_feeds">
                        <h4 class="widget_title">Instagram Kami</h4>
                        Kunjungi <a href="https://www.instagram.com/kawanpeduli_id/" target="_blank"><b>@kawanpeduli_id</b></a> <br><br><br>
                        <ul class="instagram_row flex-wrap">
                            @foreach($instagram['data'] as $ig)
                            <li>
                                <a href="{{ $ig['permalink'] }}">
                                    <img class="img-fluid" src="{{ $ig['media_url'] }}" alt="Instagram Photo">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    --}}
                    <aside class="single_sidebar_widget newsletter_widget">
                        <h4 class="widget_title">Media Berlangganan</h4>
                        <form method="POST" action="{{ route('mail.store') }}">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror placeholder hide-on-focus" placeholder="Masukkan Email" value="{{ old('email') }}">
                                @error('email')
                                <div class="invalid-feedback" role="alert">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" class="button rounded-0 primary-bg text-white w-100">Berlangganan</button>
                        </form>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
