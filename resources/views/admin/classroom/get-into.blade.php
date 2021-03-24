@extends('layouts.admin')

@section('title')
    <title>Employees</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">{{ __('Classroom') }}
                        of {{ $classroom->name }} </div>

                    <div class="card-body">
                        <table class="table" action="/classroom/{{$classroom->id}}" method="POST">
                            <div class="float-sm-right " style="margin-bottom: 10px; ">
                                <a href="{{route('classroom.add',$classroom->id)}}" class="btn btn-success btn-icon-split ">
                                <span class="icon text-white-50 ">
                                <i class="fas fa-plus"></i>
                                 </span>
                                    <span class="text">new student</span>
                                </a>
                            </div>
                            <thead>
                            <tr>
                                <th scope="col">students</th>
                                <th scope="col">grades</th>
                                <th scope="col">rank</th>
                                <th scope="col" style="text-align: center">action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                <tr>
                                    @if($student->classe_id == $classroom->id )
                                    <td>{{$student->first_name}} {{$student->last_name}}</td>
                                    <td></td>
                                    <td></td>
                                    <td>
                                        <div class="row" style="display: flex; justify-content: center;">
                                        </div>
                                    </td>
                                @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection


