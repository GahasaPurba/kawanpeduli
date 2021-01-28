@extends('backend.template.master')

@section('title', 'Blog (Category List)')

@section('pagetitle', 'Blog (Category List)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Admin')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Category</h4>
                <div class="card-header-action">
                    <a href="{{ route('category.create') }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"></i> Add New Category</a>
                </div>
                &nbsp; &nbsp; &nbsp;
                <div class="card-header-form">
                    <form method="GET" action="{{ route('categorysearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control @error('search') is-invalid @enderror" placeholder="Search" value="{{ old('search') }}">
                            @error('search')
                            <div class="invalid-feedback" role="alert">
                                {{ $message }}
                            </div>
                            @enderror
                            <div class="input-group-btn">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Category Name</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category => $result)
                            <tr>
                                <td class="text-center">{{ $category + $categories->firstitem() }}</td>
                                <td>{{ $result->name }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('category.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('category.edit', $result->id) }}" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $categories->links() }}
            </div>
        </div>
    </div>
</div>
@endif

@endsection
