@extends('backend.template.master')

@section('title', 'Subscription (Mailing List)')

@section('pagetitle', 'Subscription (Mailing List)')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Mailing List</h4>
                <div class="card-header-form">
                    <form method="GET" action="{{ route('mailsearch') }}">
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
                                <th class="text-center">Email</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($mails as $mail => $result)
                            <tr>
                                <td class="text-center">{{ $mail + $mails->firstitem() }}</td>
                                <td>{{ $result->email }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('mail.destroy', $result->id) }}">
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
                {{ $mails->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
