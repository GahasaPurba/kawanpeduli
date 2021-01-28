@extends('backend.template.master')

@section('title', 'User Feedback (Detail Questionnaire Result)')

@section('pagetitle', 'User Feedback (Detail Questionnaire Result)')

@section('content')

@if (Auth::check() && Auth::user()->role == 'Admin')
<div class="row justify-content-center">
    <div class="col-lg-6 col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Questionnaire</h4>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Responden Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ $questionnaires->user->name }}" readonly>
                </div>
                <div class="form-group">
                    <label for="gender">Gender</label>
                    <input type="text" name="gender" id="gender" class="form-control" value="{{ $questionnaires->user->gender }}" readonly>
                </div>
                <div class="form-group">
                    <label for="dateofbirth">Date Of Birth</label>
                    <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" value="{{ $questionnaires->user->dateofbirth }}" readonly>
                </div>
                <div class="form-group">
                    <label for="province">Address</label>
                    <input type="text" name="province" id="province" class="form-control" value="{{ $questionnaires->user->province }}" readonly>
                </div>
                <div class="form-group">
                    <label for="question1">Menurut Anda, Apakah Website Ini Bermanfaat ?</label>
                    <input type="text" name="question1" id="question1" class="form-control" value="{{ $questionnaires->question1 }}" readonly>
                </div>
                <div class="form-group">
                    <label for="question2">Menurut Anda, Apakah Blog Yang Ada Di Website Ini Informatif ?</label>
                    <input type="text" name="question2" id="question2" class="form-control" value="{{ $questionnaires->question2 }}" readonly>
                </div>
                <div class="form-group">
                    <label for="question3">Menurut Anda, Apakah Forum Diskusi Yang Ada Di Website Ini Berguna ?</label>
                    <input type="text" name="question3" id="question3" class="form-control" value="{{ $questionnaires->question3 }}" readonly>
                </div>
                <div class="form-group">
                    <label for="question4">Menurut Anda, Bagaimana Kelengkapan Statistik Data COVID-49 Di Website Ini ?</label>
                    <input type="text" name="question4" id="question4" class="form-control" value="{{ $questionnaires->question4 }}" readonly>
                </div>
                <div class="form-group">
                    <label for="suggestion">Berikan Saran Anda Agar Kami Dapat Meningkatkan Kualitas Website Ini Kedepannya</label>
                    <textarea name="suggestion" id="suggestion" class="form-control" readonly>{{ $questionnaires->suggestion }}</textarea>
                </div>
                <div class="form-group">
                    <a href="{{ route('questionnaire.index') }}" class="btn btn-info btn-block">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endif

@endsection
