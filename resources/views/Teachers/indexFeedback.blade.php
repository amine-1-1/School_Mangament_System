@extends('layouts.indexTeacher')

@section('title')
    Feedback
@endsection

@section('content')

    <div class="card-header ">
        <h1 class="card-category">Teachers : Azer Laaribi</h1>
    </div>
    <div class="row">
        <div class="col-md-9">
            <form class="">
                <div class="form-group">
                    <label for="exampleInputEmail1">Sujet</label>
                    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Sujet">
                </div>
                <div class="form-group">
                    <label for="exampleFormControlTextarea1">Feedback</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="5"></textarea>
                </div>
            </form>
        </div>
    </div>
@endsection

