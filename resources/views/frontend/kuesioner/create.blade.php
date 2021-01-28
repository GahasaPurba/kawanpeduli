@extends('frontend.template.master')

@section('title', 'Kuesioner')

@section('content')

<section class="breadcrumb blog_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb_iner">
                    <div class="breadcrumb_iner_item">
                        <h2>Kuesioner</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="whole-wrap">
    <div class="container box_1170">
        <div class="section-top-border">
            <h3 class="contact-title text-center">Silahkan Isi Beberapa Kuesioner Yang Telah Kami Sediakan Berikut</h3>
            <br><br><br>
            <div class="row">
                <div class="col-lg-12">
                    <form id="contactForm" method="POST" action="{{ route('questionnaire.store') }}" class="form-contact contact_form">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="question1">
                                        <h4>Menurut Anda, Apakah Website Ini Bermanfaat ?</h4>
                                    </label>
                                    <select name="question1" id="question1" class="form-control @error('question1') is-invalid @enderror selectric">
                                        <option value="">Pilih Jawaban</option>
                                        <option value="Tidak Bermanfaat">Tidak Bermanfaat</option>
                                        <option value="Kurang Bermanfaat">Kurang Bermanfaat</option>
                                        <option value="Bermanfaat">Bermanfaat</option>
                                        <option value="Sangat Bermanfaat">Sangat Bermanfaat</option>
                                    </select>
                                    @error('question1')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="question2">
                                        <h4>Menurut Anda, Apakah Blog Yang Ada Di Website Ini Informatif ?</h4>
                                    </label>
                                    <select name="question2" id="question2" class="form-control @error('question2') is-invalid @enderror selectric">
                                        <option value="">Pilih Jawaban</option>
                                        <option value="Tidak Informatif">Tidak Informatif</option>
                                        <option value="Kurang Informatif">Kurang Informatif</option>
                                        <option value="Informatif">Informatif</option>
                                        <option value="Sangat Informatif">Sangat Informatif</option>
                                    </select>
                                    @error('question2')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="question3">
                                        <h4>Menurut Anda, Apakah Forum Diskusi Yang Ada Di Website Ini Berguna ?</h4>
                                    </label>
                                    <select name="question3" id="question3" class="form-control @error('question3') is-invalid @enderror selectric">
                                        <option value="">Pilih Jawaban</option>
                                        <option value="Tidak Berguna">Tidak Berguna</option>
                                        <option value="Kurang Berguna">Kurang Berguna</option>
                                        <option value="Berguna">Berguna</option>
                                        <option value="Sangat Berguna">Sangat Berguna</option>
                                    </select>
                                    @error('question3')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label for="question4">
                                        <h4>Menurut Anda, Bagaimana Kelengkapan Statistik Data COVID-19 Di Website Ini ?</h4>
                                    </label>
                                    <select name="question4" id="question4" class="form-control @error('question4') is-invalid @enderror selectric">
                                        <option value="">Pilih Jawaban</option>
                                        <option value="Tidak Lengkap">Tidak Lengkap</option>
                                        <option value="Kurang Lengkap">Kurang Lengkap</option>
                                        <option value="Lengkap">Lengkap</option>
                                        <option value="Sangat Lengkap">Sangat Lengkap</option>
                                    </select>
                                    @error('question4')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12">
                                <label for="suggestion">
                                    <h4>Berikan Saran Anda Agar Kami Dapat Meningkatkan Kualitas Website Ini Kedepannya</h4>
                                </label>
                                <div class="form-group">
                                    <textarea name="suggestion" id="suggestion" class="form-control @error('suggestion') is-invalid @enderror w-100 placeholder hide-on-focus" cols="30" rows="9" placeholder="Ketikkan Saran">{{ old('suggestion') }}</textarea>
                                    @error('suggestion')
                                    <div class="invalid-feedback" role="alert">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="button button-contactForm btn-block">Kirim</button>
                            <a href="{{ url('/') }}" class="button button-contactForm btn-block text-center">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
