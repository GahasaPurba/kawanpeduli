@extends('backend.template.master')

@section('title', 'Role (Author)')

@section('pagetitle', 'Role (Author)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Admin')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Author</h4>
                <div class="card-header-form">
                    <form method="GET" action="{{ route('authorsearch') }}">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="search" id="search" class="form-control @error('search') is-invalid @enderror" placeholder="Search Name" value="{{ old('search') }}">
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
                                <th class="text-center">Profile Photo</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Gender</th>
                                <th class="text-center">Date Of Birth</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Province</th>
                                <th class="text-center">City</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($authors as $author => $result)
                            <tr>
                                <td class="text-center">{{ $author + $authors->firstitem() }}</td>
                                <td class="text-center">
                                    <img alt="Profile Photo" class="fluid rounded-circle" width="70" src="{{ asset('upload/profilephoto/' . $result->avatar) }}">
                                </td>
                                <td>{{ $result->name }}</td>
                                <td class="text-center">{{ $result->gender }}</td>
                                <td class="text-center">{{ $result->dateofbirth }}</td>
                                <td>{{ $result->email }}</td>
                                <td>{{ $result->province }}</td>
                                <td>{{ $result->city }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('author.update', $result->id) }}">
                                        @csrf
                                        @method('patch')
                                        <button type="submit" class="btn btn-icon icon-left btn-warning"><i class="fas fa-user"></i> Make User</button>
                                    </form>
                                    &nbsp;
                                    <form method="POST" action="{{ route('author.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
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
                {{ $authors->links() }}
            </div>
        </div>
    </div>
</div>
@endif

@endsection
