@extends('backend.template.master')

@section('title', 'Edit Announcement')

@section('pagetitle', 'Edit Announcement')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Announcement</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('announcement.update', $announcements->id) }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="title">Announcement Title</label>
                        <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror" placeholder="Masukkan Judul Pengumuman" value="{{ $announcements->title }}" autofocus>
                        @error('title')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <p class="text-small text-muted">Ketikkan Konten Dari Pengumuman Ini</p>
                        <textarea name="content" id="content" class="form-control @error('content') is-invalid @enderror">{{ $announcements->content }}</textarea>
                        @error('content')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-warning btn-block">Edit</button>
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
