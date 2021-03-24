@extends('layouts.indexTeacher')
@section('title')
    <title>add user</title>
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
                    <div class="card-header">Ask for vacation</div>

                    <div class="card-body">
                        <form class="form-horizontal" action="/teacher/vacations" method="POST" id="createVacation">
                            @csrf

                            <fieldset>

                                <div class="control-group">

                                    <!-- Username -->
                                    <label class="control-label" for="first_name">Start Date</label>
                                    <div class="controls">
                                        <input value="{{old('start_date')}}" type="date" id="start_date"
                                               name="start_date" placeholder="" class="form-control input-sm">

                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label" for="last_name">End Date</label>
                                    <div class="controls">
                                        <input value="{{old('end_date')}}" type="date" id="end_date" name="end_date"
                                               placeholder="" class="form-control input-sm">
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label" for="reason">Reason</label>
                                    <div class="controls">
                                        <textarea id="reason" name="reason" class="form-control" style="width: 100%"
                                                  rows="3">{{old('reason')}}</textarea>
                                        <p class="help-block"></p>
                                    </div>

                                </div>

                                <div class="control-group">
                                    <!-- Button -->
                                    <div class="controls">
                                        <button id="submit" class="btn btn-success float-sm-right "
                                                style="padding: 10px 24px ;margin-top: 5px">Save
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
