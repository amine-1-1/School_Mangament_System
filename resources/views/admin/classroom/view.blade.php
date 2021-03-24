@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection
@section('title')
    <title>Teachers</title>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('Students') }}</div>
                    <div class="col-xl-3 col-md-6 mb-4 " style="height: 40px ;position: absolute" >
                        <div class="card border-left-secondary shadow h-100 " >
                            <div class="card-body">
                                <div class=" font-weight-bold text-secondary text-uppercase mb-3" style="font-size: 14px;text-align: center;margin-top: -9px">
                                    number of student: {{$classroom->number}}</div>
                                <div class="row no-gutters align-items-center"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="float-sm-right " style="margin-bottom: 10px; ">
                            <a href="{{route('classroom.add',$classroom->id)}}" class="btn btn-success btn-icon-split ">
                                <span class="icon text-white-50 ">
                                <i class="fas fa-plus"></i>
                                 </span>
                                <span class="text">new student</span>
                            </a>
                        </div>

                        <table class="table" id="myTable">


                            <thead>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>

                                <th scope="col" style="text-align: center">Actions</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($students as $student)
                                @if($student->Classe_id == $classroom->id)
                                <tr>
                                    <td>{{$student->first_name}}</td>
                                    <td>{{$student->last_name}}</td>
                                    <td>{{$student->email }}</td>



                                    @if(Illuminate\Support\Facades\Auth::guard('admin')->user()->id ==1||Illuminate\Support\Facades\Auth::guard('admin')->user()->id ==2)

                                        <td>

                                            <div class="row" style="display: flex; justify-content: center;">
                                                <a href="{{route('admin.student.edit.password',$student->id)}}"
                                                   class="btn btn-warning btn-circle  mr-1 ">
                                                    <i class="fas fa-key"></i>
                                                </a>
                                                <a href="{{route('admin.student.edit.info',$student->id)}}"
                                                   class="btn btn-info btn-circle btn mr-1">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="{{route('student.delete',$student->id)}}"
                                                      method="POST"
                                                      class="float-left">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button  type="submit" class="btn btn-danger btn-circle"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </form>

                                            </div>
                                        </td>
                                    @endif
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript" src="//cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

@endsection
