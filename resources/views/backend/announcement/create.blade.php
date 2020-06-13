@extends('backend.template.master')

@section('title', 'Add Announcement')

@section('pagetitle', 'Add Announcement')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Announcement</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('announcement.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Announcement Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Pengumuman" value="{{ old('title') }}" autofocus>
                        @error('title')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <p class="text-small text-muted">Ketikkan Konten Dari Pengumuman Ini</p>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>
                        @error('content')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-info btn-block">Add Announcement</button>
                        <a href="{{ route('announcement.index') }}" class="btn btn-danger btn-block">Cancel</a>
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
    CKEDITOR.replace('content');

</script>

@endsection
