@extends('layouts.admin')
@section('title')
    <title>edit-profile</title>
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
                    <div class="card-header">Edit user {{ $user->first_name }}_{{ $user->last_name }}</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="/user/{{$user->id}}/info" method="POST" id="editAdmin">
                            @csrf
                            <fieldset>


                            <div class="control-group">
                                <!-- Username -->
                                <label class="control-label" for="first_name">firstname</label>
                                <div class="controls">
                                    <input value="{{ $user->first_name }}" type="text" id="first_name"
                                           name="first_name" placeholder="" class="form-control input-sm">
                                    @if($errors->has('first_name'))
                                        <div class="text-danger">{{ $errors->first('first_name') }}</div>
                                    @endif
                                    <p class="help-block"></p>
                                </div>
                                <label class="control-label" for="last_name">lastname</label>
                                <div class="controls">
                                    <input value="{{ $user->last_name }}" type="text" id="last_name"
                                           name="last_name" placeholder="" class="form-control input-sm">
                                    @if($errors->has('last_name'))
                                        <div class="text-danger">{{ $errors->first('last_name') }}</div>
                                    @endif
                                    <p class="help-block"></p>
                                </div>

                            </div>

                            <div class="control-group">
                                <!-- E-mail -->
                                <label class="control-label" for="email">E-mail</label>
                                <div class="controls">
                                    <input value="{{ $user->email }}" disabled type="text" id="email" name="email"
                                           placeholder="" class="form-control input-sm">
                                    <p class="help-block"></p>
                                </div>

                            </div>
                            <div class="control-group">
                                <label for="role_id">Role</label>
                                <select id="role_id" name="role_id" class="form-control">
                                    @foreach($roles as $role)
                                        <option value="{{$role->id}}">{{$role->name}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="control-group">
                                <!-- Button -->
                                <div class="controls">
                                    <div class="control-group">
                                        <!-- Button -->
                                        <div class="controls">
                                            <button id="submit-form" class="btn btn-success float-sm-right "
                                                    style="padding: 10px 24px ;margin-top: 5px">Save
                                            </button>
                                        </div>

                                    </div>
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



