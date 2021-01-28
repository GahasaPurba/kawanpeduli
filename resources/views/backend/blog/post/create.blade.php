@extends('backend.template.master')

@section('title', 'Blog (Add Post)')

@section('pagetitle', 'Blog (Add Post)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Admin' || Auth::user()->role == 'Author')
<div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Post</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Post" value="{{ old('title') }}" autofocus>
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
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                            <option value="{{ $tag->id }}">{{ $tag->name }}</option>
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
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="quote">Quote</label>
                        <p class="text-small text-muted">Ketikkan Quote Yang Berhubungan Dengan Postingan Ini</p>
                        <textarea name="quote" id="quote" class="form-control @error('quote') is-invalid @enderror">{{ old('quote') }}</textarea>
                        @error('quote')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="thumbnail">Thumbnail</label>
                        <input type="text" onfocus="this.type='file'" name="thumbnail" id="thumbnail" class="form-control @error('thumbnail') is-invalid @enderror" placeholder="Upload Thumbnail" value="{{ old('thumbnail') }}">
                        @error('thumbnail')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-info btn-block">Add Post</button>
                        <a href="{{ route('post.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@endsection

@section('script')

<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('content');
    CKEDITOR.replace('quote');

</script>

@endsection
