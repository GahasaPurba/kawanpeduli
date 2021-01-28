@extends('backend.template.master')

@section('title', 'Forum (Edit Category)')

@section('pagetitle', 'Forum (Edit Category)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Admin')
<div class="row justify-content-center">
    <div class="col-xl-6 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Category</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('forumcategory.update', $categories->id) }}">
                    @csrf
                    @method('patch')
                    <div class="form-group">
                        <label for="name">Category Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Kategori" value="{{ $categories->name }}" autofocus>
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="form-control btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('forumcategory.index') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
