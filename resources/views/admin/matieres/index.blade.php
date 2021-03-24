@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('title')
    <title>Teachers</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Matiere') }}</div>

                    <div class="card-body">

                        <table class="table" id="myTable">

                            <div class="float-sm-right " style="margin-bottom: 10px; ">
                                <a href="/subject-create" class="btn btn-success btn-icon-split ">
                                <span class="icon text-white-50 ">
                                <i class="fas fa-plus"></i>
                                 </span>
                                    <span class="text">new subject</span>
                                </a>
                            </div>
                            <thead>


                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Class</th>
                                <th scope="col">Teacher</th>


                            </tr>

                            </thead>
                            <tbody>
                            @foreach($matieres as $subject)
                                @foreach($teachers as $teacher)
                                    @foreach($classes as $classe)
                                        <tr>
                                            <td>{{$subject->name}}</td>
                                            @if($subject->Teacher_id == $teacher->id)
                                                <td>{{$teacher->first_name}} {{$teacher->last_name}} </td>
                                            @endif
                                            @if($subject->Classe_id == $classe->id)
                                                <td>{{$classe->name}}</td>
                                            @endif

                                        </tr>
                                    @endforeach
                                @endforeach
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

@endsection







