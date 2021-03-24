@extends('layouts.indexTeacher')

@section('title')
  Notes
@endsection

@section('content')
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Notes</h6><a class="btn btn-primary float-right" href="/AjouterNotes" role="button" >Ajouter Note</a>
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
                                            <th>Classe</th>
                                            <th>Exam/DS/TP/Projet Module/Projet Semestriel</th>
                                            <th>Note</th>
                                            <th>Remarque</th>
                                            <th>Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($matieres as $matiere)
                                      @foreach($notes as $note)
                                      @foreach($students as $student)
                                      @if($matiere->id == $note->Matiere_id && $note->Student_id==$student->id)
                                        <tr class="">
                                            <th>{{$matiere->name}}</th>
                                            <th>{{$student->name}}</th>
                                            <th>C-{{$student->Classe_id}}</th>
                                            <th>{{$note->Type}}</th>
                                            <th>{{$note->valeur}}</th>
                                            <th>{{$note->remarque}}</th>
                                            <th>{{$note->created_at}}</th>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered"  width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Classe</th>
                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($classes as $classe)
                                    <tr class="">
                                        <th>C-{{$classe->id}}</th>
                                        <th>{{$classe->name}}</th>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>



@endsection
@section('javascript')
  <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript">
    $(document).ready( function () {
    $('#myTable').DataTable();
  } );
  </script>
@endsection
