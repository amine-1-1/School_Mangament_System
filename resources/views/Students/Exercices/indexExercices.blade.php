@extends('layouts.indexStudent')

@section('title')
    Cours
@endsection
@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('content')
    @foreach($exercices as $exercice)
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Exercice</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form accept-charset="UTF-8" action="{{route('RemisExercice',$exercice->id )}}" method="POST"
                          enctype="multipart/form-data">
                        <div class="modal-body">
                            @csrf
                            <div class="form-group mt-3">
                                <label class="mr-2">Choisie un Fichier:</label>
                                <input id="file" type="file" name="file">
                            </div>
                            <hr>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary">Sauvegarder</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    @endforeach


    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Exercices</h6>
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
                    <tr style="text-align : center">
                        <th>Titre</th>
                        <th>Maiter</th>
                        <th>Classe</th>
                        <th>Date Limite</th>
                        <th>jours restants</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exercices as $exercice)
                        @foreach($matieres as $matiere)
                            @foreach($classes as $classe)
                                @if($exercice->Matiere_id == $matiere->id && $exercice->Classe_id == $classe->id && (\Carbon\Carbon::parse (\Carbon\Carbon::now()) <= (\Carbon\Carbon::parse ($exercice->deadline))))
                                    <tr style="text-align : center">
                                        <td>{{$exercice->name}}</td>
                                        <td>{{$matiere->name}}</td>
                                        <td>{{$classe->name}}</td>
                                        <td>{{$exercice->deadline}}</td>
                                        <td>{{ \Carbon\Carbon::parse (\Carbon\Carbon::now())->diffInDays(\Carbon\Carbon::parse ($exercice->deadline))}}
                                            Jours
                                        </td>
                                        <td>
                                            <div class="row" style="display : flex; justify-content:center;">
                                                <a href=""
                                                   class="btn btn-primary btn-circle mr-1">
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                <button type="button" class="btn btn-success btn-circle mr-1"
                                                        data-toggle="modal" data-target="#exampleModal"><i
                                                        class="fas fa-plus"></i></button>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Exercices</h6>
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
                    <tr style="text-align : center">
                        <th>Titre</th>
                        <th>Maiter</th>
                        <th>Classe</th>
                        <th>Date Limite</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($exercices as $exercice)
                        @foreach($matieres as $matiere)
                            @foreach($classes as $classe)
                                @if($exercice->Matiere_id == $matiere->id && $exercice->Classe_id == $classe->id && (\Carbon\Carbon::parse (\Carbon\Carbon::now()) >= (\Carbon\Carbon::parse ($exercice->deadline))))
                                    <tr style="text-align : center">
                                        <td>{{$exercice->name}}</td>
                                        <td>{{$matiere->name}}</td>
                                        <td>{{$classe->name}}</td>
                                        <td>{{$exercice->deadline}}</td>
                                        <td>
                                            <div class="row" style="display : flex; justify-content:center;">
                                                <a href="{{route('DownloadCours',$exercice->id )}}"
                                                   class="btn btn-primary btn-circle mr-1" >
                                                    <i class="fas fa-download"></i>
                                                </a>
                                                <a  href="{{route('exercice.view',$exercice->id )}}"
                                                    class="btn btn-warning btn-circle mr-1" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        @endforeach
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('javascript')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>
@endsection
