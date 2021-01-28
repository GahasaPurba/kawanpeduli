@extends('backend.template.master')

@section('title', 'Profile (Edit Profile)')

@section('pagetitle', 'Profile (Edit Profile)')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Profile</h4>
            </div>
            <div class="card-body">
                @if (Auth::check() && Auth::user()->id == $users->id)
                <form method="POST" action="{{ route('editprofile.update', $users->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('patch')
                    <div class="form-divider">
                        Personal
                    </div>
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap" value="{{ $users->name }}" autofocus>
                        @error('name')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="gender">Gender</label>
                        <select name="gender" id="gender" class="form-control @error('gender') is-invalid @enderror selectric">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-laki" @if($users->gender == 'Laki-laki')
                                selected
                                @endif
                                >Laki-laki</option>
                            <option value="Perempuan" @if($users->gender == 'Perempuan')
                                selected
                                @endif
                                >Perempuan</option>
                        </select>
                        @error('gender')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="dateofbirth">Date Of Birth</label>
                        <input type="date" name="dateofbirth" id="dateofbirth" class="form-control @error('dateofbirth') is-invalid @enderror" placeholder="Masukkan Tanggal Lahir" value="{{ $users->dateofbirth }}">
                        @error('dateofbirth')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email" value="{{ $users->email }}">
                        @error('email')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Masukkan Password Baru Jika Ingin Mengganti Password">
                        @error('password')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <img name="output" id="output" alt="Profile Photo" class="img-fluid rounded" width="200" src="{{ asset('upload/profilephoto/' . $users->avatar) }}">
                    </div>
                    <div class="form-group">
                        <label for="avatar">Profile Photo</label>
                        <p class="text-small text-muted">Direkomendasikan Untuk Mengupload Foto Yang Berdimensi 1 X 1</p>
                        <input type="text" onfocus="this.type='file'" onchange="loadFile(event)" accept="image/*" name="avatar" id="avatar" class="form-control @error('avatar') is-invalid @enderror" placeholder="Upload Photo Baru Jika Ingin Mengganti Foto Profil">
                        @error('avatar')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-divider">
                        Address
                    </div>
                    <div class="form-group">
                        <label for="province">Province</label>
                        <select name="province" id="province" class="form-control @error('province') is-invalid @enderror selectric">
                            <option value="">Pilih Provinsi</option>
                            <option value="Aceh" @if($users->province == 'Aceh')
                                selected
                                @endif
                                >Aceh</option>
                            <option value="Sumatera Utara" @if($users->province == 'Sumatera Utara')
                                selected
                                @endif
                                >Sumatera Utara</option>
                            <option value="Riau" @if($users->province == 'Riau')
                                selected
                                @endif
                                >Riau</option>
                            <option value="Sumatera Barat" @if($users->province == 'Sumatera Barat')
                                selected
                                @endif
                                >Sumatera Barat</option>
                            <option value="Kepulauan Riau" @if($users->province == 'Kepulauan Riau')
                                selected
                                @endif
                                >Kepulauan Riau</option>
                            <option value="Jambi" @if($users->province == 'Jambi')
                                selected
                                @endif
                                >Jambi</option>
                            <option value="Bengkulu" @if($users->province == 'Bengkulu')
                                selected
                                @endif
                                >Bengkulu</option>
                            <option value="Sumatera Selatan" @if($users->province == 'Sumatera Selatan')
                                selected
                                @endif
                                >Sumatera Selatan</option>
                            <option value="Kepulauan Bangka Belitung" @if($users->province == 'Kepulauan Bangka Belitung')
                                selected
                                @endif
                                >Kepulauan Bangka Belitung</option>
                            <option value="Lampung" @if($users->province == 'Lampung')
                                selected
                                @endif
                                >Lampung</option>
                            <option value="DKI Jakarta" @if($users->province == 'DKI Jakarta')
                                selected
                                @endif
                                >DKI Jakarta</option>
                            <option value="Banten" @if($users->province == 'Banten')
                                selected
                                @endif
                                >Banten</option>
                            <option value="Jawa Barat" @if($users->province == 'Jawa Barat')
                                selected
                                @endif
                                >Jawa Barat</option>
                            <option value="Jawa Tengah" @if($users->province == 'Jawa Tengah')
                                selected
                                @endif
                                >Jawa Tengah</option>
                            <option value="Daerah Istimewa Yogyakarta" @if($users->province == 'Daerah Istimewa Yogyakarta')
                                selected
                                @endif
                                >Daerah Istimewa Yogyakarta</option>
                            <option value="Jawa Timur" @if($users->province == 'Jawa Timur')
                                selected
                                @endif
                                >Jawa Timur</option>
                            <option value="Kalimantan Barat" @if($users->province == 'Kalimantan Barat')
                                selected
                                @endif
                                >Kalimantan Barat</option>
                            <option value="Kalimantan Tengah" @if($users->province == 'Kalimantan Tengah')
                                selected
                                @endif
                                >Kalimantan Tengah</option>
                            <option value="Kalimantan Selatan" @if($users->province == 'Kalimantan Selatan')
                                selected
                                @endif
                                >Kalimantan Selatan</option>
                            <option value="Kalimantan Timur" @if($users->province == 'Kalimantan Timur')
                                selected
                                @endif
                                >Kalimantan Timur</option>
                            <option value="Kalimantan Utara" @if($users->province == 'Kalimantan Utara')
                                selected
                                @endif
                                >Kalimantan Utara</option>
                            <option value="Sulawesi Barat" @if($users->province == 'Sulawesi Barat')
                                selected
                                @endif
                                >Sulawesi Barat</option>
                            <option value="Sulawesi Selatan" @if($users->province == 'Sulawesi Selatan')
                                selected
                                @endif
                                >Sulawesi Selatan</option>
                            <option value="Sulawesi Tenggara" @if($users->province == 'Sulawesi Tenggara')
                                selected
                                @endif
                                >Sulawesi Tenggara</option>
                            <option value="Sulawesi Tengah" @if($users->province == 'Sulawesi Tengah')
                                selected
                                @endif
                                >Sulawesi Tengah</option>
                            <option value="Sulawesi Utara" @if($users->province == 'Sulawesi Utara')
                                selected
                                @endif
                                >Sulawesi Utara</option>
                            <option value="Gorontalo" @if($users->province == 'Gorontalo')
                                selected
                                @endif
                                >Gorontalo</option>
                            <option value="Bali" @if($users->province == 'Bali')
                                selected
                                @endif
                                >Bali</option>
                            <option value="Nusa Tenggara Barat" @if($users->province == 'Nusa Tenggara Barat')
                                selected
                                @endif
                                >Nusa Tenggara Barat</option>
                            <option value="Nusa Tenggara Timur" @if($users->province == 'Nusa Tenggara Timur')
                                selected
                                @endif
                                >Nusa Tenggara Timur</option>
                            <option value="Maluku" @if($users->province == 'Maluku')
                                selected
                                @endif
                                >Maluku</option>
                            <option value="Maluku Utara" @if($users->province == 'Maluku Utara')
                                selected
                                @endif
                                >Maluku Utara</option>
                            <option value="Papua" @if($users->province == 'Papua')
                                selected
                                @endif
                                >Papua</option>
                            <option value="Papua Barat" @if($users->province == 'Papua Barat')
                                selected
                                @endif
                                >Papua Barat</option>
                        </select>
                        @error('province')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="city">City</label>
                        <input type="text" name="city" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Masukkan Kota" value="{{ $users->city }}">
                        @error('city')
                        <div class="invalid-feedback" role="alert">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button class="form-control btn btn-warning btn-block">Edit</button>
                        <a href="{{ route('home') }}" class="btn btn-danger btn-block">Cancel</a>
                    </div>
                </form>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')

<script>
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
    };

</script>

@endsection
