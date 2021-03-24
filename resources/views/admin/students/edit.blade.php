@extends('layouts.admin')
@section('title')
    <title>edit profile</title>
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
                    <div class="card-header">profile of {{ $student->first_name }} {{ $student->last_name }}</div>


                    <div class="card-body">
                        <form class="form-horizontal" action="/student-edit/{{$student->id}}/info" method="POST"
                              id="editEmployee">
                            @csrf

                            <fieldset>

                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="first_name">firstname</label>
                                    <div class="controls">
                                        <input value="{{ $student->first_name }}" type="text" id="first_name"
                                               name="first_name"
                                               placeholder="" class="form-control input-sm">
                                        @if($errors->has('first_name'))
                                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                        @endif
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label" for="last_name">lastname</label>
                                    <div class="controls">
                                        <input value="{{ $student->last_name }}" type="text" id="last_name"
                                               name="last_name"
                                               placeholder=""
                                               class="form-control input-sm">
                                        @if($errors->has('last_name'))
                                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                        @endif
                                        <p class="help-block"></p>
                                    </div>

                                </div>

                                <div class="control-group">
                                    <!-- E-mail -->
                                    <div class="control-group">
                                        <label for="role_id">phone_number</label>
                                        <div class="controls">
                                            <input value="{{ $student->phone_number }}" type="text" id="phone_number"
                                                   name="phone_number"
                                                   placeholder="" class="form-control input-sm">
                                            <p class="help-block"></p>
                                        </div>
                                    </div>
                                    <label class="control-label" for="email">E-mail</label>
                                    <div class="controls">
                                        <input value="{{ $student->email }}" disabled type="text" id="email"
                                               name="email"
                                               placeholder=""
                                               class="form-control input-sm">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="role_id">birth_date</label>
                                    <div class="controls">
                                        <input value="{{ $student->birth_date }}" disabled type="date" id="birth_date"
                                               name="birth_date"
                                               placeholder="" class="form-control input-sm">
                                        <p class="help-block"></p>
                                    </div>
                                </div>

                                <div class="control-group">
                                    <!-- Button -->
                                    <button id="submit" class="btn btn-success float-sm-right "
                                            style="padding: 10px 24px ;margin-top: 5px">Save
                                    </button>
                                </div>
                            </fieldset>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection


