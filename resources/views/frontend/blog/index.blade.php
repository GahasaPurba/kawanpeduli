@extends('frontend.template.master')

@section('title', 'Blog')

@section('content')

<section class="breadcrumb blog_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Blog</h2>
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
                    @foreach($posts as $post)
                    <article class="blog_item">
                        <div class="blog_item_img">
                            <img alt="Thumbnail" class="card-img rounded-0" src="{{ asset('upload/thumbnail/' . $post->thumbnail) }}">
                            <a href="#" class="blog_item_date">
                                <h3>{{ $post->created_at->format('d') }}</h3>
                                <p>{{ $post->created_at->format('M') }}</p>
                            </a>
                        </div>
                        <div class="blog_details">
                            <a href="{{ route('singleblog', $post->slug) }}" class="d-inline-block">
                                <h2>{{ $post->title }}</h2>
                            </a>
                            <p class="text-justify">
                                {!! Str::words($post->content, 50, ' . . . . .') !!}
                            </p>
                            <ul class="blog-info-link">
                                <li><a href="#"><i class="far fa-user"></i> {{ $post->user->name }}</a></li>
                                <li><a href="#"><i class="far fa-bookmark"></i> {{ $post->category->name }}</a></li>
                                <li><a href="#"><i class="far fa-comments"></i> {{ $post->comments->count() }} Komentar</a></li>
                            </ul>
                        </div>
                    </article>
                    @endforeach
                    <nav class="blog-pagination justify-content-center d-flex">
                        {{ $posts->links() }}
                    </nav>
                </div>
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
                        @foreach($data as $post)
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
