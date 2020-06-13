@extends('backend.template.master')

@section('title', 'Blog (Edit Tag)')

@section('pagetitle', 'Blog (Edit Tag)')

@section('content')

<div class="row justify-content-center">
    <div class="col-xl-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Tag</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tag.update', $tags->id) }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Tag" value="{{ $tags->name }}" autofocus>
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('tag.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
