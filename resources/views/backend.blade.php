@extends('backend.template.master')

@section('title', 'Dashboard')

@section('pagetitle', 'Dashboard')

@section('content')

<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="fas fa-pen"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Posts</h4>
                </div>
                <div class="card-body">
                    {{ $jumlahpost }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-comments"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Discussions</h4>
                </div>
                <div class="card-body">
                    {{ $jumlahdiscussion }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="fas fa-users-cog"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Authors</h4>
                </div>
                <div class="card-body">
                    {{ $authors }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-info">
                <i class="fas fa-users"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Users</h4>
                </div>
                <div class="card-body">
                    {{ $users }}
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Greetings</h4>
            </div>
            <div class="card-body text-center">
                <img alt="Logo KawanPeduli" class="img-fluid" width="400" src="{{ asset('frontend/img/logo.png') }}">
                <br><br><br>
                <p class="text-justify">
                    KawanPeduli Adalah Sebuah Website Dari Indonesia Yang Digagas Oleh Tim SixteenCoder - KawanPeduli dari
                    Proyek Akhir Mata Kuliah PSW II Di Institut Teknologi Del. Website Ini Dibuat Untuk Menjadi Wadah Informasi dan Komunikasi
                    Bagi Masyarakat, Mengenai COVID-19 Yang Melanda Dunia Saat Ini. Semoga Dengan Adanya Website Ini Kita Semakin Kuat Untuk Memerangi Wabah Ini.
                    Terimakasih Telah Mengunjungi Website Ini, Semoga Website Ini Dapat Bermanfaat Bagi Banyak Orang.<br>
                </p>
                <p class="text-justify">
                    Selamat Datang di Dashboard, KawanPeduli. Di Sini Anda Bisa Membuat Post Baru, Jika Anda Seorang Author. Dan Membuat Diskusi Baru, Jika Anda Seorang User.
                    Bijaklah Dalam Membuat Post Atau Diskusi Baru. Kami Tim Administrator Akan Tetap Mengecek Post Atau Diskusi Yang Anda Tambahkan Agar Tetap Sesuai Dengan Syarat Dan Ketentuan
                    Yang Berlaku Di Website Ini. Terimakasih.<br><br>
                    Salam Tim Administrator - KawanPeduli<br>
                    <b>#UntukIndonesiaBebasCorona</b>
                </p>
            </div>
        </div>
    </div>
</div>
@if (Auth::user()->role == 'Admin')
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Latest Posts</h4>
                <div class="card-header-action">
                    <a href="{{ route('post.index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Author</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $post)
                            <tr>
                                <td>
                                    {{ $post->title }}
                                    <div class="table-links">
                                        <a href="#">{{ $post->category->name }}</a>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="font-weight-600">
                                        <img alt="Profile Photo" class="rounded-circle mr-1" width="30" src="{{ asset('upload/profilephoto/' . $post->user->avatar) }}"> {{ $post->user->name }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('home.destroypost', $post->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('home.editpost', $post->id) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 col-md-12 col-12 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h4>Latest Discussions</h4>
                <div class="card-header-action">
                    <a href="{{ route('discussion.index') }}" class="btn btn-primary">View All</a>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th class="text-center">Title</th>
                                <th class="text-center">Started By</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($discussions as $discussion)
                            <tr>
                                <td>
                                    {{ $discussion->title }}
                                    <div class="table-links">
                                        <a href="#">{{ $discussion->forum_category->name }}</a>
                                    </div>
                                </td>
                                <td>
                                    <a href="#" class="font-weight-600">
                                        <img alt="Profile Photo" class="rounded-circle mr-1" width="30" src="{{ asset('upload/profilephoto/' . $discussion->user->avatar) }}"> {{ $discussion->user->name }}
                                    </a>
                                </td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('home.destroydiscussion', $discussion->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('home.editdiscussion', $discussion->id) }}" class="btn btn-warning btn-action mr-1" data-toggle="tooltip" title="Edit"><i class="fas fa-pencil-alt"></i></a>
                                        <button type="submit" class="btn btn-danger btn-action"><i class="fas fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
