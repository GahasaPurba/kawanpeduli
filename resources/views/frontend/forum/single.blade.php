@extends('frontend.template.master')

@section('title', 'Forum Diskusi')

@section('content')

<section class="breadcrumb blog_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Forum Diskusi</h2>
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
                @foreach($data as $singleforum)
                <div class="single-post">
                    <div class="blog_details">
                        <h1>{{ $singleforum->title }}</h1>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="far fa-user"></i>Started By : {{ $singleforum->user->name }}</a></li>
                            <li><a href="#"><i class="far fa-calendar"></i> {{ $singleforum->created_at->format('d M Y') }}</a></li>
                            <li><a href="#"><i class="far fa-bookmark"></i> {{ $singleforum->forum_category->name }}</a></li>
                            <li><a href="#"><i class="far fa-comments"></i> {{ $singleforum->comments->count() }} Percakapan</a></li>
                        </ul>
                        <p>
                            {!! $singleforum->description !!}
                        </p>
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
                                <div class="detials">
                                    <p>Diskusi Sebelumnya</p>
                                    <a href="{{ route('singleforum', $previous->slug) }}">
                                        <h4>{{ $previous->title }}</h4>
                                    </a>
                                </div>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                @if ($next)
                                <div class="detials">
                                    <p>Diskusi Selanjutnya</p>
                                    <a href="{{ route('singleforum', $next->slug) }}">
                                        <h4>{{ $next->title }}</h4>
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="comments-area">
                    <h3><b>Kolom Diskusi</b></h3>
                    <h4>{{ $singleforum->comments->count() }} Percakapan</h4>
                    <p class="text-muted">Silahkan Berikan Pertanyaan, Jawaban Atau Komentar Anda, Pada Kolom Diskusi Dibawah</p> <br>
                    @comments(['model' => $singleforum])
                </div>
                @endforeach
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget search_widget">
                        <a href="{{ route('discussion.create') }}" class="text-center button rounded-0 primary-bg text-white w-100">Buat Diskusi Baru</a>
                    </aside>
                    <aside class="single_sidebar_widget search_widget">
                        <form method="GET" action="{{ route('forumsearch') }}">
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
                                <a href="{{ route('forumcategory', $category->slug) }}" class="d-flex">
                                    <p>{{ $category->name }}</p>
                                    &nbsp;
                                    <p>({{ $category->discussion->count() }})</p>
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Diskusi Terbaru</h3>
                        @foreach($discussions as $discussion)
                        <div class="media post_item">
                            <div class="media-body">
                                <a href="{{ route('singleforum', $discussion->slug) }}">
                                    <h3>{{ Str::words($discussion->title, 4) }}</h3>
                                </a>
                                <p>{{ $discussion->created_at->diffForHumans() }}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                    <aside class="single_sidebar_widget tag_cloud_widget">
                        <h4 class="widget_title">Kumpulan Tag</h4>
                        <ul class="list">
                            @foreach($tags as $tag)
                            <li>
                                <a href="{{ route('forumtag', $tag->slug) }}">{{ $tag->name }}</a>
                            </li>
                            @endforeach
                        </ul>
                    </aside>
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

@section('script')

<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('comment');

</script>

@endsection
