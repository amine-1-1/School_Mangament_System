@extends('layouts.indexStudent')

@section('title')
    Students
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

    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif
    <div class="row">

        <div class="card card col-md-6 col-lg-6">
            <div class="card-body">
                <h3 class="card-title" style="text-align:center; color : Red"><b>Exercice</b></h3>
                <hr>
                @foreach ($exercices as $exercice)
                    @foreach($matieres as $matiere)
                        @if(\Carbon\Carbon::parse (\Carbon\Carbon::now()) <= (\Carbon\Carbon::parse ($exercice->deadline)))
                            <div class=" alert alert-danger alert-icon" role="alert">
                                <i class="fas fa-calendar-alt"> </i><b> {{\Carbon\Carbon::now()->toFormattedDateString()}}</b>
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <div class="alert-icon-content">
                                    <h4 class="alert-heading"><b><i class="fas fa-file-pdf"></i> {{$exercice->name}}
                                            | {{$matiere->name}} | {{$exercice->deadline}}</b></h4>
                                    il vous
                                    reste {{ \Carbon\Carbon::parse (\Carbon\Carbon::now())->diffInDays(\Carbon\Carbon::parse ($exercice->deadline))}}
                                    jours pour remettre cette exercice
                                </div>
                                <hr>
                                <div class="">
                                    <a href="{{route('DownloadExercices',$exercice->id )}}"
                                       class="btn btn-danger btn-circle mr-1">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a data-toggle="modal" data-target="#exampleModal"
                                       class="btn btn-danger btn-circle mr-1 float-right">
                                        <i class="fas fa-plus"></i>
                                    </a>
                                </div>
                            </div>
                        @endif
                    @endforeach
                @endforeach
            </div>
        </div>
        <div class="card card col-md-6 col-lg-6">
            <div class="card-body">
                <h3 class="card-title" style="text-align:center; color : Green"><b>Exercice Remis</b></h3>
                <hr>
                @foreach ($exerciceRemis as $exerciceRemi)
                    @foreach($matieres as $matiere)
                        <div class=" alert alert-success alert-icon" role="alert">
                            <i class="fas fa-calendar-alt"> </i><b> {{\Carbon\Carbon::now()->toFormattedDateString()}}</b>
                            <button class="close" type="button" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                            <div class="alert-icon-content">
                                <h6 class="alert-heading"><b><i
                                            class="fas fa-file-pdf"></i> {{$exerciceRemi->file_name}}
                                        | {{$matiere->name}} | {{$exerciceRemi->created_at->toFormattedDateString()}}
                                    </b></h6></div>
                        </div>
                    @endforeach
                @endforeach
            </div>
        </div>

    </div>
    <hr>
    <div class="card col-md-12 col-lg-12">
        <div class="card-body">
            <h3 class="card-title" style="text-align:center; color : Skyblue"><b>Student</b>
                <a class="btn btn-outline-success float-right" href="./simple-qr-code" style="text-align:center;"
                   role="button" target="_blank"><i class="fas fa-qrcode"></i> Mon QR-Code</a><a
                    class="btn btn-outline-info float-right" href="/fullcalendareventmaster" role="button"
                    target="_blank"><i class="fas fa-calendar-alt"></i> Evenement</a></h3>
            <hr>
            <div class="row">
                <div class="card col-md-4 col-lg-4 bg-info">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center; color : white"><b>Cours</b></h5>
                        <hr>
                        <a class="nav-link collapsed" href="./CourStudents"
                           style="display : flex; justify-content:center; color : white" aria-expanded="true"
                           aria-controls="collapseUtilities">
                            <i class='fas fa-chalkboard-teacher' style='font-size:50px'></i>
                        </a>
                    </div>
                </div>
                <div class="card col-md-4 col-lg-4 text-white bg-danger">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center;"><b>Exercice</b></h5>
                        <hr>
                        <a class="nav-link collapsed" href="./ExerciceStudents"
                           style="display : flex; justify-content:center; color : white" aria-expanded="true"
                           aria-controls="collapseUtilities">
                            <i class='fas fa-book-medical' style='font-size:50px'></i>

                        </a>
                    </div>
                </div>
                <div class="card col-md-4 col-lg-4 bg-success text-white">
                    <div class="card-body">
                        <h5 class="card-title" style="text-align:center;"><b>Note</b></h5>
                        <hr>
                        <a class="nav-link collapsed" href="./NoteStudent"
                           style="display : flex; justify-content:center; color : white" aria-expanded="true"
                           aria-controls="collapseUtilities">
                            <i class="fas fa-clipboard-check" style='font-size:50px'></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
