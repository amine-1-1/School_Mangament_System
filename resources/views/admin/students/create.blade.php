@extends('layouts.admin')
@section('title')
    <title>add employee</title>
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
                    <div class="card-header">Create Student</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="/student-create" method="POST" id="createEmployee">
                            @csrf

                            <fieldset>

                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="first_name">First Name</label>
                                    <div class="controls">
                                        <input value="{{old('first_name')}}" type="text" id="first_name"
                                               name="first_name"
                                               placeholder="" class="form-control input-sm">
                                        @if($errors->has('first_name'))
                                            <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                        @endif
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label" for="last_name">Last Name</label>
                                    <div class="controls">
                                        <input value="{{old('last_name')}}" type="text" id="lastName" name="last_name"
                                               placeholder="" class="form-control input-sm">
                                        @if($errors->has('last_name'))
                                            <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                        @endif
                                        <p class="help-block"></p>
                                    </div>

                                </div>

                                <div class="control-group">
                                    <!-- E-mail -->
                                    <label class="control-label" for="email">Email</label>
                                    <div class="controls">
                                        <input value="{{old('email')}} " type="text" id="email" name="email"
                                               placeholder=""
                                               class="form-control input-sm">
                                        <p class="help-block"></p>
                                    </div>

                                </div>
                                <label class="control-label" for="last_name">Phone Number</label>
                                <div class="controls">
                                    <input value="{{old('phone_number')}}" type="text" id="phone_number"
                                           name="phone_number"
                                           placeholder="" class="form-control input-sm">
                                    @if($errors->has('phone_number'))
                                        <div class="text-danger">{{ $errors->first('phone_number') }}</div>
                                    @endif
                                    <p class="help-block"></p>
                                </div>
                                <label class="control-label" for="last_name">Birth Date</label>
                                <div class="controls">
                                    <input value="{{old('birth_date')}}" type="date" id="birth_date" name="birth_date"
                                           placeholder="" class="form-control input-sm">
                                    @if($errors->has('birth_date'))
                                        <div class="text-danger">{{ $errors->first('birth_date') }}</div>
                                    @endif
                                    <p class="help-block"></p>
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

