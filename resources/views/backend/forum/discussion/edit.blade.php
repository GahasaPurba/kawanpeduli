@extends('backend.template.master')

@section('title', 'Forum (Edit Discussion)')

@section('pagetitle', 'Forum (Edit Discussion)')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Discussion</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('discussion.update', $discussions->id) }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Discussion Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Diskusi" value="{{ $discussions->title }}" autofocus>
                        @error('title')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="forum_category_id">Category</label>
                        <select name="forum_category_id" id="forum_category_id" class="form-control @error('forum_category_id') is-invalid @enderror selectric">
                            <option value="">Pilih Kategori</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->id }}" @if($discussions->forum_category_id == $category->id) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('forum_category_id')
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
                            <option value="{{ $tag->id }}" @foreach($discussions->tag as $value) @if($tag->id == $value->id) selected @endif @endforeach>{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('tag_id')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Short Description</label>
                        <p class="text-small text-muted">Ketikkan Deskripsi Singkat Mengenai Diskusi Ini</p>
                        <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror">{{ $discussions->description }}</textarea>
                        @error('description')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('discussion.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script src="https://cdn.ckeditor.com/4.14.0/full-all/ckeditor.js"></script>
<script>
    CKEDITOR.replace('description');

</script>

@endsection
