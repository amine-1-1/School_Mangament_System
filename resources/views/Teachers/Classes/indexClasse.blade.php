@extends('layouts.indexTeacher')

@section('title')
  Classes
@endsection
@section('content')
<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Emplois de temps</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="myTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Classes</th>
                                            <th>Salle</th>
                                            <th>Matiere</th>
                                            <th>Date</th>
                                            <th>Start time</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Classes</th>
                                            <th>Salle</th>
                                            <th>Matiere</th>
                                            <th>Date</th>
                                            <th>Start time</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <tr class="">
                                            <td>IA 2.1</td>
                                            <td>B03</td>
                                            <td>Matiere 1</td>
                                            <td>21/12/2020</td>
                                            <td>13:45</td>
                                        </tr>
                                        <tr>
                                            <td>IA 2.1</td>
                                            <td>B03</td>
                                            <td>Matiere 1</td>
                                            <td>21/12/2020</td>
                                            <td>15:30</td>
                                        </tr>
                                        <tr>
                                            <td>IA 2.1</td>
                                            <td>B03</td>
                                            <td>Matiere 1</td>
                                            <td>21/12/2020</td>
                                            <td>13:45</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
@endsection

@section('scripts')
@endsection
