@extends('layouts.indexTeacher')
@section('title')
  Note
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
        <form accept-charset="UTF-8" action="{{route('Store')}}" method="POST">
          @csrf
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Matieres:</label>
              <select name="Matiere_id" id="inputState" class="form-control">
                <option value="0">choisie Matiere</option>
                @foreach($matieres as $matiere)
                  @if($matiere->Teacher_id == Auth::guard('teacher')->user()->id)
                    <option value="{{$matiere->id}}">{{$matiere->name}}</option>
                  @endif
                @endforeach
              </select>
            </div>
            <div class="form-group">
              <label for="recipient-name" class="col-form-label">Eleve:</label>
                <select name="Student_id" id="inputState" class="form-control">
                  <option value="0">choisie Eleve</option>
                  @foreach($students as $student)
                  @foreach($teachers as $teacher)
                  @if($teacher->Classe_id == $student->Classe_id)
                      <option value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
                  @endif
                  @endforeach
                  @endforeach
                </select>
              </div>
            <div class="form-group col-md-4">
              <label  for="inputState">Exam, DS, TP, Projet Module ou Semestriel </label>
              <select name="Type" id="inputState" class="form-control">
                <option selected>..</option>
                <option>Exam</option>
                <option>DS</option>
                <option>TP</option>
                <option>Projet Module</option>
                <option>Projet Semestriel</option>
              </select>
            </div>
            <div class="form-group">
              <label for="exampleInputName">Note</label>
              <input type="text" name="valeur" class="form-control" id="exampleInputName" placeholder="./20" required="required">
            </div>
          <div class="form-group">
            <label for="exampleFormControlTextarea1">Remarque</label>
            <textarea class="form-control" name="remarque" id="exampleFormControlTextarea1" rows="3"></textarea>
          </div>
          <hr>
          <button type="submit" class="btn btn-primary">Submit</button><a class="btn btn-primary float-right" href="/Notes" role="button" >Voir Cours</a>
        </form>
      </div>
  </div>
</div>
</div>
@endsection
