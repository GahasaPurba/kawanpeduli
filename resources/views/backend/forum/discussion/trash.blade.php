@extends('backend.template.master')

@section('title', 'Forum (Discussion Trash)')

@section('pagetitle', 'Forum (Discussion Trash)')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Discussion</h4>
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
                                    <form method="POST" action="{{ route('discussion.kill', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('discussion.restore', $result->id) }}" class="btn btn-icon icon-left btn-success"><i class="far fa-save"></i> Restore</a>
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
                {{ $discussions->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
