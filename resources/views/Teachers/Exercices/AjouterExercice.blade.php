@extends('layouts.indexTeacher')

@section('title')
  Exercices
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
        <form accept-charset="UTF-8" action="{{route('uploadExercice')}}" method="POST" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label for="exampleInputName">Titre d'exercice</label>
            <input type="text" name="name" class="form-control" id="exampleInputName" placeholder="Titre d'exercice" required="required">
          </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Discription</label>
            <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" required="required">Cour</label>
              <select name="Cours_id" id="inputState" class="form-control">
                <option value="0">choisie Cours</option>
                  @foreach($cours as $cour)
                    <option value="{{$cour->id}}">{{$cour->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1" required="required">Classe</label>
              <select name="Classe_id" id="inputState" class="form-control">
                <option value="0">choisie Matiere</option>
                  @foreach($classes as $classe)
                    <option value="{{$classe->id}}">{{$classe->name}}</option>
                  @endforeach
              </select>
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Date Limite:</label>
            <input type="date" name="deadline"  class="form-control" id="recipient-name">
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
            <label class="mr-2">Choisie un Fichier:</label>
            <input id="file" type="file" name="file">
          </div>
          <hr>
          <button type="submit" class="btn btn-primary">Submit</button>
        </form>
      </div>
  </div>
</div>
</div>
@endsection
