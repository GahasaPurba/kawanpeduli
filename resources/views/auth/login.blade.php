@extends('auth.template.master')

@section('title', 'Login')

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
                            <h4>Login</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}" class="needs-validation">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email Anda" value="{{ old('email') }}" autofocus>
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
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
                                    <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password Anda">
                                    @error('password')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="remember" id="remember" class="custom-control-input" {{ old('remember') ? 'checked' : '' }}>
                                        <label for="remember" class="custom-control-label">Ingat Saya</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Login
                                    </button>
                                    <a href="{{ url('/') }}" class="btn btn-warning btn-lg btn-block">
                                        Batal
                                    </a>
                                </div>
                            </form>
                            <div class="text-center mt-4 mb-3">
                                <div class="text-job text-muted">Atau Login Dengan</div>
                            </div>
                            <div class="row sm-gutters">
                                <div class="col-6">
                                    <a href="{{ url('login/google') }}" class="btn btn-block btn-social btn-danger">
                                        <span class="fab fa-google"></span> Google
                                    </a>
                                </div>
                                {{-- <div class="col-6">
                                    <a href="{{ url('login/facebook') }}" class="btn btn-block btn-social btn-facebook">
                                <span class="fab fa-facebook"></span> Facebook
                                </a>
                            </div> --}}
                            <div class="col-6">
                                <a href="{{ url('login/github') }}" class="btn btn-block btn-social btn-github">
                                    <span class="fab fa-github"></span> GitHub
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5 text-muted text-center">
                    Belum Punya Akun ? <a href="{{ route('register') }}">Silahkan Registrasi</a>
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
