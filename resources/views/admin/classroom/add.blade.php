@extends('layouts.admin')
@section('title')
    <title>add contract</title>
@endsection
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Create Contracts</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="/classroom-add/{{$classroom->id}}" method="POST" enctype="multipart/form-data" id="createContract">
                            @csrf

                            <fieldset>

                                <div class="control-group">
                                    <!-- Username -->
                                    <div class="control-group">
                                        <label for="student_id">enter student</label>
                                        <select id="student_id" name="student_id" class="form-control">
                                            <option value="0">choose students</option>
                                            @foreach($students as $student)
                                                @if($student->Classe_id == 0)
                                                <option

                                              value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>


                                </div>
                                <div class="control-group">
                                    <!-- Button -->
                                    <div class="controls">
                                        <button id="submit" class="btn btn-success float-sm-right " teacherpadding: 10px 24px ;margin-top: 5px">Save
                                        </button>
                                    </div>
                                </div>

                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



















