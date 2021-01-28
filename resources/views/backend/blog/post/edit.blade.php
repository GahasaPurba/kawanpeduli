@extends('backend.template.master')

@section('title', 'Blog (Edit Post)')

@section('pagetitle', 'Blog (Edit Post)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Admin' || Auth::user()->role == 'Author')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Post</h4>
            </div>
            <div class="card-body">
                @if (Auth::check() && Auth::user()->name == $posts->user->name && Auth::user()->role == 'Author')
                <form method="POST" action="{{ route('post.update', $posts->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Post" value="{{ $posts->title }}" autofocus>
                        @error('title')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror selectric">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($posts->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag_id">Tag</label>
                        <p class="text-small text-muted">Pilih Tag</p>
                        <select name="tag_id[]" id="tag_id" class="form-control @error('tag_id') is-invalid @enderror select2" multiple>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @foreach($posts->tag as $value) @if($tag->id == $value->id) selected @endif @endforeach>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <p class="text-small text-muted">Ketikkan Konten Dari Postingan Ini</p>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ $posts->content }}</textarea>
                        @error('content')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quote">Quote</label>
                        <p class="text-small text-muted">Ketikkan Quote Yang Berhubungan Dengan Postingan Ini</p>
                        <textarea name="quote" id="quote" class="form-control @error('quote') is-invalid @enderror">{{ $posts->quote }}</textarea>
                        @error('quote')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img name="output" id="output" alt="Thumbnail" class="img-fluid rounded" width="300" src="{{ asset('upload/thumbnail/' . $posts->thumbnail) }}">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="text" onfocus="this.type='file'" onchange="loadFile(event)" accept="image/*" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Upload Thumbnail Baru Jika Ingin Mengganti">
                        @error('thumbnail')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('post.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
                @elseif (Auth::check() && Auth::user()->role == 'Admin')
                <form method="POST" action="{{ route('post.update', $posts->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Post" value="{{ $posts->title }}" autofocus>
                        @error('title')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="category_id">Category</label>
                        <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror selectric">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($posts->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="tag_id">Tag</label>
                        <p class="text-small text-muted">Pilih Tag</p>
                        <select name="tag_id[]" id="tag_id" class="form-control @error('tag_id') is-invalid @enderror select2" multiple>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->id }}" @foreach($posts->tag as $value) @if($tag->id == $value->id) selected @endif @endforeach>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <p class="text-small text-muted">Ketikkan Konten Dari Postingan Ini</p>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ $posts->content }}</textarea>
                        @error('content')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quote">Quote</label>
                        <p class="text-small text-muted">Ketikkan Quote Yang Berhubungan Dengan Postingan Ini</p>
                        <textarea name="quote" id="quote" class="form-control @error('quote') is-invalid @enderror">{{ $posts->quote }}</textarea>
                        @error('quote')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img name="output" id="output" alt="Thumbnail" class="img-fluid rounded" width="300" src="{{ asset('upload/thumbnail/' . $posts->thumbnail) }}">
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="text" onfocus="this.type='file'" onchange="loadFile(event)" accept="image/*" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Upload Thumbnail Baru Jika Ingin Mengganti">
                        @error('thumbnail')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('post.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>
<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('quote');

</script>

@endsection
