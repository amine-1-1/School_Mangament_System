@extends('layouts.indexTeacher')

@section('title')
  Cours
@endsection
@section('content')
<div class="row">
  <div class="col-md-9">
    <div class="card-body" id="example">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
      <div class="col-md-9 offset-md-3 mt-5">
        <form accept-charset="UTF-8" action="{{route('uploadFile')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName">Titre de cours</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Enter your name and surname" required="required">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" required="required">Classe</label>
              <select name="Classe_id" id="inputState" class="form-control">
                <option value="0">choisie Classse</option>
                  @foreach($classes as $classe)
                    <option value="{{$classe->id}}">{{$classe->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="exampleFormControlSelect1">Matiere</label>
              <select name="Matiere_id" id="inputState" class="form-control">
                <option value="0">choisie Matiere</option>
                  @foreach($matieres as $matiere)
                    <option value="{{$matiere->id}}">{{$matiere->name}}</option>
                  @endforeach
              </select>
          <hr>
          <div class="form-group mt-3">
            <label class="mr-2" for="filename">Choisie un Fichier:</label>
            <input id="file" type="file" name="file">
          </div>
          <hr>
          <button type="submit" class="btn btn-primary">Submit</button><a class="btn btn-primary float-right" href="/Cours" role="button" >Voir Cours</a>
        </form>
      </div>
  </div>
</div>
</div>
@endsection
