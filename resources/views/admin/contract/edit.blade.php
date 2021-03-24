@extends('layouts.admin')
@section('title')
    <title>edit-contract</title>
@endsection
@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">contract of {{ $contract->first_name }} {{ $contract->last_name }} date :
                        from {{$contract->hired_date}} to {{ $contract->departure_date }}</div>
                    <div class="card-body">
                        <form class="form-horizontal" action="/contract/{{$contract->id}}/info" method="POST"
                              id="editContract">
                            @csrf

                            <div class="control-group">
                                <div class="control-group">
                                    <label for="type_id">Contract Type</label>
                                    <select id="type_id" name="type_id" class="form-control">
                                        @foreach($types as $type)
                                            <option @if($type->id ==$contract->type->id )selected
                                                    @endif value="{{$type->id}}">{{$type->name}}</option>
                                        @endforeach
                                    </select>


                                    <label for="role_id">hiring date</label>
                                    <div class="controls">
                                        <input value="{{ $contract->hired_date }}" type="date" id="hired_date"
                                               name="hired_date"
                                               placeholder="" class="form-control input-sm">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <label for="role_id">departure_date</label>
                                    <div class="controls">
                                        <input value="{{ $contract->departure_date }}" type="date" id="departure_date"
                                               name="departure_date"
                                               placeholder="" class="form-control input-sm">
                                        <p class="help-block"></p>
                                    </div>
                                </div>
                                <label for="file">Choose file</label>
                                <input type="file" name="file"/>

                                <div class="control-group">
                                    <div class="controls">
                                        <button id="submit" class="btn btn-success float-sm-right "
                                                style="padding: 10px 24px ;margin-top: 5px">Save
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection




