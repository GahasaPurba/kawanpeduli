@extends('backend.template.master')

@section('title', 'Blog (Post List)')

@section('pagetitle', 'Blog (Post List)')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Post</h4>
                <div class="card-header-action">
                    @if(Auth::user()->role == 'Admin')
                    <a href="{{ route('postpdf') }}" class="btn btn-icon icon-left btn-danger"><i class="fas fa-file-pdf"></i> PDF</a>
                    <a href="{{ route('postexcel') }}" class="btn btn-icon icon-left btn-success"><i class="fas fa-file-excel"></i> XLSX</a>
                    &nbsp; &nbsp; &nbsp;
                    @endif
                    <a href="{{ route('post.create') }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"></i> Add New Post</a>
                </div>
                @if(Auth::user()->role == 'Admin')
                &nbsp; &nbsp; &nbsp;
                <div class="card-header-form">
                    <form method="GET" action="{{ route('postsearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control @error('search') is-invalid @enderror" placeholder="Search Title" value="{{ old('search') }}">
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
                @endif
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Category</th>
                                <th class="text-center">Tag</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Thumbnail</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post => $result)
                            <tr>
                                <td class="text-center">{{ $post + $posts->firstitem() }}</td>
                                <td>{{ $result->title }}</td>
                                <td>{{ $result->category->name }}</td>
                                <td>
                                    @foreach ($result->tag as $tags)
                                    <ul>
                                        <span class="badge badge-primary">{{ $tags->name }}</span>
                                    </ul>
                                    @endforeach
                                </td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">
                                    <img alt="Thumbnail" class="fluid rounded" width="100" src="{{ asset('upload/thumbnail/' . $result->thumbnail) }}">
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('post.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('post.edit', $result->id) }}" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Edit</a>
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
                {{ $posts->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
