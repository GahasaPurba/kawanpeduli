@extends('auth.template.master')

@section('title', 'Konfirmasi Password')

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
                            <h4>Konfirmasi Password</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted text-justify">Konfirmasi Password Anda Sebelum Melanjutkan Ke Halaman Yang Dituju</p>
                            <form method="POST" action="{{ route('password.confirm') }}">
                                @csrf
                                <div class="form-group">
                                    <div class="d-block">
                                        <label for="password">Password</label>
                                        <div class="float-right">
                                            @if (Route::has('password.request'))
                                            <a href="{{ route('password.request') }}" class="text-small">
                                                Lupa Password ?
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Ulang Password Anda" autofocus>
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Konfirmasi Password
                                    </button>
                                    <a href="{{ url('/') }}" class="btn btn-danger btn-lg btn-block">
                                        Batal
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="simple-footer">
                        Copyright &copy; SixteenCoder <script>document.write(new Date().getFullYear());</script>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
