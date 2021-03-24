@extends('layouts.indexStudent')

@section('title')
  Students
@endsection
@section('content')
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Cours</h6>
                        </div>
                        <div class="card-body">
                          @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr style="text-align : center">
                                            <th>Titre </th>
                                            <th>Maiter</th>
                                            <th>Classe</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($cours as $cour)
                                      @foreach($matieres as $matiere)
                                      @foreach($classes as $classe)
                                      @if($cour->matiere_id == $matiere->id && $cour->Classe_id == $classe->id)
                                        <tr style="text-align : center">
                                          <td>{{$cour->name}}</td>
                                          <td>{{$matiere->name}}</td>
                                          <td>{{$classe->name}}</td>
                                          <td>
                                            <div class="row" style="display : flex; justify-content:center;">
                                              <a href="{{route('DownloadCours',$cour->id )}}"
                                               class="btn btn-primary btn-circle mr-1">
                                                <i class="fas fa-download"></i>
                                              </a>
                                                <a  href="{{route('cour.view',$cour->id )}}"
                                                   class="btn btn-warning btn-circle mr-1" target="_blank">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                              <form action="{{route('DeleteCours',$cour->id)}}"
                                                      method="POST"
                                                      class="float-left">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button  type="submit" class="btn btn-danger btn-circle mr-1"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                              </div>
                                            </td>
                                        </tr>
                                        @endif
                                        @endforeach
                                        @endforeach
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
@endsection
@section('scripts')
@endsection
