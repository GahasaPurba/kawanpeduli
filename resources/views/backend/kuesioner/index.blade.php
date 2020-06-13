@extends('backend.template.master')

@section('title', 'User Feedback (Questionnaire Result)')

@section('pagetitle', 'User Feedback (Questionnaire Result)')

@section('content')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4>Questionnaire</h4>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">#</th>
                                <th class="text-center">Responden</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($questionnaires as $questionnaire => $result)
                            <tr>
                                <td class="text-center">{{ $questionnaire + $questionnaires->firstitem() }}</td>
                                <td>{{ $result->user->name }}</td>
                                <td class="text-center">
                                    <form method="POST" action="{{ route('questionnaire.destroy', $result->id) }}">
                                        @csrf
                                        @method('delete')
                                        <a href="{{ route('questionnaire.show', $result->id) }}" class="btn btn-icon icon-left btn-primary"><i class="fas fa-info"></i> Detail</a>
                                        <button type="submit" class="btn btn-icon icon-left btn-danger"><i class="fas fa-times"></i> Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="card-footer">
                {{ $questionnaires->links() }}
            </div>
        </div>
    </div>
</div>

@endsection
