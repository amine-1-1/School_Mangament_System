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
                    <div class="card-header">{{ __('Teachers') }}</div>

                    <div class="card-body">

                        <table class="table" id="myTable">

                            <div class="float-sm-right " style="margin-bottom: 10px; ">
                                <a href="/teacher-create" class="btn btn-success btn-icon-split ">
                                <span class="icon text-white-50 ">
                                <i class="fas fa-plus"></i>
                                 </span>
                                    <span class="text">new teacher</span>
                                </a>
                            </div>
                            <thead>


                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>

                                <th scope="col" style="text-align: center">Actions</th>
                            </tr>

                            </thead>
                            <tbody>
                            @foreach($teachers as $teacher)
                                <tr>
                                    <td>{{$teacher->first_name}}</td>
                                    <td>{{$teacher->last_name}}</td>
                                    <td>{{$teacher->email }}</td>


                                    @if(Illuminate\Support\Facades\Auth::guard('admin')->user()->role->id ==1||Illuminate\Support\Facades\Auth::guard('admin')->user()->role->id ==2)

                                        <td>

                                            <div class="row" style="display: flex; justify-content: center;">
                                                <a href="{{route('admin.teacher.edit.password',$teacher->id)}}"
                                                   class="btn btn-warning btn-circle  mr-1 ">
                                                    <i class="fas fa-key"></i>
                                                </a>
                                                <a href="{{route('admin.teacher.edit.info',$teacher->id)}}"
                                                   class="btn btn-info btn-circle btn mr-1">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a href="{{route('contracts.index',$teacher->id)}}"
                                                   class="btn btn-primary btn-circle btn mr-1">
                                                    <i class="fas fa-file-contract"></i>
                                                </a>
                                                <form action="{{route('teacher.delete',$teacher->id)}}"
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
                            @endforeach
                            </tbody>
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








