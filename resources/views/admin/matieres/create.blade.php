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
                    <div class="card-header">Create Subject</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="/subject-create" method="POST" enctype="multipart/form-data"
                              id="createContract">
                            @csrf

                            <fieldset>

                                <div class="control-group">
                                    <!-- Username -->
                                    <div class="controls">
                                        <label for="contract_type">name</label>
                                        <input value="" type="text" id="name"
                                               name="name" placeholder="enter the class name"
                                               class="form-control input-sm">
                                        <p class="help-block"></p>
                                    </div>
                                    <div class="control-group">
                                        <label for="Teacher_id">Teacher name</label>
                                        <select id="Teacher_id" name="Teacher_id" class="form-control">
                                            <option value="0">choose teacher</option>
                                            @foreach($teachers as $teacher)
                                                <option
                                                    value="{{$teacher->id}}">{{$teacher->first_name}} {{$teacher->last_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label for="Classe_id">Class</label>
                                    <select id="Classe_id" name="Classe_id" class="form-control">
                                        <option value="0">choose classroom</option>
                                        @foreach($classes as $classe)
                                            <option value="{{$classe->id}}">{{$classe->name}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="control-group">
                                    <!-- Button -->
                                    <div class="controls">
                                        <button id="submit" class="btn btn-success float-sm-right " teacherpadding: 10px
                                                24px ;margin-top: 5px
                                        ">Save
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


















