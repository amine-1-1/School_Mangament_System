@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('title')
    <title>Administrators</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('vacations') }}</div>

                    <div class="card-body">

                        <table class="table" id="myTable">
                            <thead>

                            <span class="text"></span>


                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">start_date</th>
                                <th scope="col">end_date</th>
                                <th scope="col">Reason</th>
                                <th scope="col">Days_number</th>

                                <th scope="col">status</th>

                                <th scope="col">Actions</th>

                            </tr>
                            </thead>
                            <tbody>
                            @foreach($vacations as $vacation)
                                <tr>
                                    <td>{{$vacation->teacher->first_name}}.{{$vacation->teacher->last_name}}</td>
                                    <td>{{$vacation->start_date}}</td>
                                    <td>{{$vacation->end_date}}</td>
                                    <td>{{$vacation->reason}}</td>
                                    <td>{{ \Carbon\Carbon::parse ($vacation->start_date)->diffInDays(\Carbon\Carbon::parse ($vacation->end_date))}}</td>
                                    <td>@if($vacation->status==0)Being processed @elseif($vacation->status==1) accepted @else Refused @endif </td>

                                    <td >
                                        <div class="row" style="display: flex; justify-content: center;">
                                            @if($vacation->status==0)
                                                <form action="{{route('vacation.active',$vacation->id)}}" method="POST"
                                                      class="float-left">
                                                    {{ method_field('POST') }}
                                                    @csrf
                                                    <button type="submit" class="btn btn-success btn-circle mr-1">
                                                        <i class="fas fa-check"></i>
                                                    </button>

                                                </form>
                                                <form action="{{route('vacation.refuse',$vacation->id)}}" method="POST"
                                                      class="float-left">
                                                    {{ method_field('POST') }}
                                                    @csrf
                                                    <button type="submit" class="btn btn-danger btn-circle mr-1">
                                                        <i class="fas fa-times"></i>
                                                    </button>

                                                </form>
                                        @endif


                                    </td>
                                </tr>


                            </tbody>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>



