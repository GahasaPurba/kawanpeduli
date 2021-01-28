@extends('backend.template.master')

@section('title', 'Detail Announcement')

@section('pagetitle', 'Detail Announcement')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Announcement</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Announcement Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{ $announcements->title }}" readonly>
                </div>
                <div class="form-group">
                    <label for="content">Content</label>
                    <p>
                        {!! $announcements->content !!}
                    </p>
                </div>
                <div class="form-group">
                    <label for="created_at">Created At</label>
                    <input type="text" name="created_at" id="created_at" class="form-control" value="{{ $announcements->created_at }}" readonly>
                </div>
                <div class="form-group">
                    <a href="{{ route('announcement.index') }}" class="btn btn-info btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
