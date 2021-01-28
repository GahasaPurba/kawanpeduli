@extends('frontend.template.master')

@section('title', 'Forum')

@section('content')

<section class="breadcrumb blog_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Forum</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="blog_area area-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    @foreach($discussions as $discussion)
                    <article class="blog_item">
                        <div class="blog_details">
                            <a href="#" class="blog_item_date">
                                <h4>{{ $discussion->created_at->format('d M Y') }}</h4> <br>
                            </a>
                            <a href="{{ route('singleforum', $discussion->slug) }}" class="d-inline-block">
                                <h2>{{ $discussion->title }}</h2>
                            </a>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="far fa-user"></i>Started By : {{ $discussion->user->name }}</a></li>
                                <li><a href="#"><i class="fas fa-link"></i> {{ $discussion->forum_category->name }}</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> {{ $discussion->comments->count() }} Percakapan</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach
                    <nav class="blog-pagination justify-content-center d-flex">
                        {{ $discussions->links() }}
                    </nav>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    @if (Auth::check())
                    <aside class="single_sidebar_widget search_widget">
                        <a href="{{ route('discussion.create') }}" class="text-center button rounded-0 primary-bg text-white w-100">Buat Diskusi Baru</a>
                    </aside>
                    @endif
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
                        @foreach($data as $discussion)
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
