@extends('backend.template.master')

@section('title', 'Blog (Add Tag)')

@section('pagetitle', 'Blog (Add Tag)')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Tag</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('tag.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="name">Tag Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Tag" value="{{ old('name') }}" autofocus>
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-info btn-block">Add Tag</button>
                        <a href="{{ route('tag.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
