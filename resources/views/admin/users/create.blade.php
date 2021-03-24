@extends('layouts.admin')
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
                    <div class="card-header">Create Users</div>
                    <div class="card-body">
                        <form class="form-horizontal " action="/user" method="POST" id="createAdmin">
                            @csrf
                            <fieldset>
                                <div class="control-group">
                                    <!-- Username -->
                                    <label class="control-label" for="first_name">First Name</label>
                                    <div class="controls">
                                        <input value="{{old('first_name')}}" type="text" id="first_name"
                                               name="first_name" placeholder="" class="form-control input-sm  ">

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
                                        <input value="{{old('email')}}" type="text" id="email" name="email"
                                               placeholder="" class="form-control input-sm">


                                    </div>

                                </div>
                                <div class="control-group">
                                    <label for="role_id">Role</label>
                                    <select id="role_id" name="role_id" class="form-control">
                                        <option value="0">Select a role</option>
                                        @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="control-group">
                                    <!-- Button -->
                                    <div class="controls">
                                        <button id="submit-form" class="btn btn-success float-sm-right "
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

