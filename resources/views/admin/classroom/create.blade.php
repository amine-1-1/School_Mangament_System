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
                        <form class="form-horizontal" action="/classroom-create" method="POST" enctype="multipart/form-data" id="createContract">
                            @csrf

                            <fieldset>
                                <div class="controls">
                                    <label for="contract_type">name</label>
                                    <input value="" type="text" id="name"
                                           name="name" placeholder="enter the class name" class="form-control input-sm">
                                    <p class="help-block"></p>
                                </div>
                                <div class="controls">
                                    <label for="year">Year</label>
                                    <input value="" type="integer" id="year" name="year"
                                           placeholder="" class="form-control input-sm">
                                    <p class="help-block"></p>
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



















