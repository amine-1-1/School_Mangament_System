@extends('layouts.indexStudent')

@section('title')
    Notes
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Notes</h6>
        </div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>Matiere</th>
                        <th>Eleve</th>
                        <th>Exam/DS/TP/Projet Module/Projet Semestriel</th>
                        <th>Note</th>
                        <th>Remarque</th>
                        <th>Date</th>
                    </tr>
                    </thead>
                    @foreach($matieres as $matiere)
                        @foreach($notes as $note)
                            @foreach($students as $student)
                                @if($matiere->id == $note->Matiere_id && $note->Student_id == Auth::guard('student')->user()->id)

                                <tbody>
                                    <tr class="">
                                        <th>{{$matiere->name}}</th>
                                        <th>{{$student->name}}</th>
                                        <th>{{$note->Type}}</th>
                                        <th>{{$note->valeur}}</th>
                                        <th>{{$note->remarque}}</th>
                                        <th>{{$note->created_at}}</th>
                                    </tr>
                                </tbody>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                </table>
            </div>
        </div>
    </div>



@endsection
@section('javascript')

@endsection
