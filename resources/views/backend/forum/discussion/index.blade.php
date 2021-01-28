@extends('backend.template.master')

@section('title', 'Forum (Discussion List)')

@section('pagetitle', 'Forum (Discussion List)')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Discussion</h4>
                <div class="card-header-action">
                    <a href="{{ route('discussion.create') }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"></i> Add New Discussion</a>
                </div>
                @if(Auth::user()->role == 'Admin')
                &nbsp; &nbsp; &nbsp;
                <div class="card-header-form">
                    <form method="GET" action="{{ route('discussionsearch') }}">
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
                                <th class="text-center">Started By</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($discussions as $discussion => $result)
                            <tr>
                                <td class="text-center">{{ $discussion + $discussions->firstitem() }}</td>
                                <td>{{ $result->title }}</td>
                                <td>{{ $result->forum_category->name }}</td>
                                <td>
                                    @foreach ($result->tag as $tags)
                                    <ul>
                                        <span class="badge badge-primary">{{ $tags->name }}</span>
                                    </ul>
                                    @endforeach
                                </td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('discussion.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('discussion.edit', $result->id) }}" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Edit</a>
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
                {{ $discussions->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
