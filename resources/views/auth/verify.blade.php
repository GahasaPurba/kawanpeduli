@extends('auth.template.master')

@section('title', 'Verifikasi Email')

@section('content')

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                    <div class="login-brand">
                        <img alt="Logo KawanPeduli" class="shadow-light rounded-circle" width="100" src="{{ asset('backend/img/stisla-fill.png') }}">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Verifikasi Email</h4>
                        </div>
                        <div class="card-body">
                            @if (session('resent'))
                            <div class="alert alert-success" role="alert">
                                <p class="text-justify">
                                    Link Verifikasi Baru Telah Dikirim, Silahkan Cek Email Anda
                                </p>
                            </div>
                            @endif
                            <p class="text-muted text-justify">
                                Sebelum Melanjut, Silahkan Cek Email Anda Untuk Mendapatkan Link Verifikasi.
                                Jika Anda Tidak Menemukan Link Verifikasi Di Email Anda,
                            </p>
                            <form method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Klik Disini Untuk Mengirim Ulang
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; SixteenCoder 2020
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
