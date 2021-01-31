@extends('auth.template.master')

@section('title', 'Registrasi')

@section('content')

<div id="app">
    <section class="section">
        <div class="container mt-5">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                    <div class="login-brand">
                        <img alt="Logo KawanPeduli" class="shadow-light rounded-circle" width="100" src="{{ asset('backend/img/stisla-fill.png') }}">
                    </div>
                    <div class="card card-primary">
                        <div class="card-header">
                            <h4>Registrasi</h4>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" value="{{ old('name') }}" autofocus>
                                    @error('name')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="gender">Jenis Kelamin</label>
                                    <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror selectric">
                                        <option value="">Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                    @error('gender')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="dateofbirth">Tanggal Lahir</label>
                                    <input type="text" onfocus="this.type='date'" name="dateofbirth" id="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror datepicker" placeholder="Masukkan Tanggal Lahir" value="{{ old('dateofbirth') }}">
                                    @error('dateofbirth')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control @error('email') is-invalid @enderror pwstrength" placeholder="Masukkan Password" data-indicator="pwindicator">
                                        @error('password')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                        <div id="pwindicator" class="pwindicator">
                                            <div class="bar"></div>
                                            <div class="label"></div>
                                        </div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password_confirmation">Konfirmasi Password</label>
                                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Ulangi Password">
                                    </div>
                                </div>
                                <div class="form-divider">
                                    Alamat
                                </div>
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="province">Provinsi</label>
                                        <select name="province" id="province" class="form-control @error('province') is-invalid @enderror selectric">
                                            <option value="">Pilih Provinsi</option>
                                            <option value="Aceh">Aceh</option>
                                            <option value="Sumatera Utara">Sumatera Utara</option>
                                            <option value="Riau">Riau</option>
                                            <option value="Sumatera Barat">Sumatera Barat</option>
                                            <option value="Kepulauan Riau">Kepulauan Riau</option>
                                            <option value="Jambi">Jambi</option>
                                            <option value="Bengkulu">Bengkulu</option>
                                            <option value="Sumatera Selatan">Sumatera Selatan</option>
                                            <option value="Kepulauan Bangka Belitung">Kepulauan Bangka Belitung</option>
                                            <option value="Lampung">Lampung</option>
                                            <option value="DKI Jakarta">DKI Jakarta</option>
                                            <option value="Banten">Banten</option>
                                            <option value="Jawa Barat">Jawa Barat</option>
                                            <option value="Jawa Tengah">Jawa Tengah</option>
                                            <option value="Daerah Istimewa Yogyakarta">Daerah Istimewa Yogyakarta</option>
                                            <option value="Jawa Timur">Jawa Timur</option>
                                            <option value="Kalimantan Barat">Kalimantan Barat</option>
                                            <option value="Kalimantan Tengah">Kalimantan Tengah</option>
                                            <option value="Kalimantan Selatan">Kalimantan Selatan</option>
                                            <option value="Kalimantan Timur">Kalimantan Timur</option>
                                            <option value="Kalimantan Utara">Kalimantan Utara</option>
                                            <option value="Sulawesi Barat">Sulawesi Barat</option>
                                            <option value="Sulawesi Selatan">Sulawesi Selatan</option>
                                            <option value="Sulawesi Tenggara">Sulawesi Tenggara</option>
                                            <option value="Sulawesi Tengah">Sulawesi Tengah</option>
                                            <option value="Sulawesi Utara">Sulawesi Utara</option>
                                            <option value="Gorontalo">Gorontalo</option>
                                            <option value="Bali">Bali</option>
                                            <option value="Nusa Tenggara Barat">Nusa Tenggara Barat</option>
                                            <option value="Nusa Tenggara Timur">Nusa Tenggara Timur</option>
                                            <option value="Maluku">Maluku</option>
                                            <option value="Maluku Utara">Maluku Utara</option>
                                            <option value="Papua">Papua</option>
                                            <option value="Papua Barat">Papua Barat</option>
                                        </select>
                                        @error('province')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="city">Kota</label>
                                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Masukkan Kota" value="{{ old('city') }}">
                                        @error('city')
                                        <div class="invalid-feedback" role="alert">
                                            {{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class=" form-group">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" name="agree" id="agree" class="custom-control-input">
                                        <label for="agree" class="custom-control-label">Saya Setuju Dengan Persyaratan Yang Ada di Website Ini</label>
                                    </div>
                                </div>
                                <div class="mt-3 mb-3 text-muted text-center">
                                    Sudah Punya Akun ? <a href="{{ route('login') }}">Silahkan Login</a>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                        Register
                                    </button>
                                    <a href="{{ url('/') }}" class="btn btn-warning btn-lg btn-block">
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
