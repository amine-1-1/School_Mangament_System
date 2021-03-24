@extends('layouts.admin')
@section('title')
    <title>edit-password</title>
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
                    <div class="card-header">Change {{ $teacher->first_name }} {{ $teacher->last_name }} password</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="/teacher-edit/{{$teacher->id}}/password" method="POST" id="editPassword">
                            @csrf

                            <fieldset>

                                <div class="control-group">
                                    <!-- Username -->

                                    <label class="control-label" for="password">New Password</label>
                                    <div class="controls">
                                        <input value="" type="password" id="new_password" name="new_password"
                                               placeholder="" class="form-control input-sm">
                                        @if($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first(' password') }}</div>
                                        @endif
                                        <p class="help-block"></p>
                                    </div>
                                    <label class="control-label" for="password">Confirm New Password</label>
                                    <div class="controls">
                                        <input value="" type="password" id="new_password_confirmation"
                                               name="new_password_confirmation" placeholder=""
                                               class="form-control input-sm">
                                        @if($errors->has('password'))
                                            <div class="text-danger">{{ $errors->first('password') }}</div>
                                        @endif
                                        <p class="help-block"></p>
                                    </div>

                                </div>


                                <div class="control-group">
                                    <!-- Button -->
                                    <div class="controls">
                                        <button type="submit" class="btn btn-success float-sm-right "
                                                style="padding: 10px 24px">Save
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


