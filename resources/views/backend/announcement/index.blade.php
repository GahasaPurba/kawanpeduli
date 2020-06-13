@extends('backend.template.master')

@section('title', 'Announcement List')

@section('pagetitle', 'Announcement List')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Announcement</h4>
                @if (Auth::user()->role == 'Admin')
                <div class="card-header-action">
                    <a href="{{ route('announcement.create') }}" class="btn btn-icon icon-left btn-info"><i class="fas fa-plus"></i> Add New Announcement</a>
                </div>
                &nbsp; &nbsp; &nbsp;
                @endif
                <div class="card-header-form">
                    <form method="GET" action="{{ route('announcementsearch') }}">
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
                                <th class="text-center">Title</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($announcements as $announcement => $result)
                            <tr>
                                <td class="text-center">{{ $announcement + $announcements->firstitem() }}</td>
                                <td>{{ $result->title }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('announcement.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        @if (Auth::user()->role == 'Admin')
                                        <a href="{{ route('announcement.edit', $result->id) }}" class="btn btn-icon icon-left btn-warning"><i class="far fa-edit"></i> Edit</a>
                                        <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete</button>
                                    </form>
                                    @else
                                    <a href="{{ route('announcement.show', $result->id) }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info"></i> Detail</a>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $announcements->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
