@extends('backend.template.master')

@section('title', 'Blog (Post Trash)')

@section('pagetitle', 'Blog (Post Trash)')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Post</h4>
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
                                    <form method="POST" action="{{ route('post.kill', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('post.restore', $result->id) }}" class="btn btn-icon icon-left btn-success"><i class="far fa-save"></i> Restore</a>
                                        <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete Permanently</button>
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
