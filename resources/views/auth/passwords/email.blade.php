@extends('auth.template.master')

@section('title', 'Lupa Password')

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
                            <h4>Lupa Password</h4>
                        </div>
                        <div class="card-body">
                            @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                            @endif
                            <p class="text-muted text-justify">Kami Akan Mengirimkan Link Ke Email Anda</p>
                            <form method="POST" action="{{ route('password.email') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ old('email') }}" autofocus>
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Kirim Link Reset Password
                                    </button>
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
