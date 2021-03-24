@extends('layouts.indexTeacher')

@section('title')
    <title>Employees</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card" style="position: relative">
                    <div class="card-header">{{ __('Contracts') }} of {{ Auth::guard('teacher')->user()->first_name }}
                        _{{ Auth::guard('teacher')->user()->last_name }}
                    </div>
                    <div class="card-body">
                        <table class="table" action="/teacher/{{Auth::guard('teacher')->user()->id}}/contracts"
                               method="POST">
                            <thead>

                            <tr>
                                <th scope="col">Contract Type</th>
                                <th scope="col">Hired Date</th>
                                <th scope="col">End Date</th>
                                <th scope="col" style="text-align: center">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($contracts as $contract)
                                <tr>
                                    <td>{{$contract->type->name}}</td>
                                    <td>{{$contract->hired_date}}</td>
                                    <td>{{$contract->departure_date }}</td>

                                    <td>
                                        <div class="row" style="display: flex; justify-content: center;">
                                            <a target="_blank" href="{{route('contract.view',$contract->id )}}"
                                               class="btn btn-warning btn-circle mr-1">
                                                <i class="fas fa-eye"></i>
                                            </a>


                                            <a href="{{route('contract.download',$contract->id )}}"
                                               class="btn btn-primary btn-circle mr-1">
                                                <i class="fas fa-download"></i>
                                            </a>


                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                            </tbody>


                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

