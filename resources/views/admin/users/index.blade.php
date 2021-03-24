@extends('layouts.admin')

@section('style')
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
@endsection

@section('title')
    <title>Administrators</title>
@endsection
@section('style')
    <style>
        .pagination > li > a,
        .pagination > li > span {
            color: #5a5c69 !Important;
        }

        .pagination > .active > a,
        .pagination > .active > a:focus,
        .pagination > .active > a:hover,
        .pagination > .active > span,
        .pagination > .active > span:focus,
        .pagination > .active > span:hover {
            background-color: #5a5c69 !Important;
            border-color: #5a5c69 !Important;
            color: white !Important;

        }
    </style>
@endsection

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">{{ __('users') }}</div>

                    <div class="card-body">

                        <table class="table" id="myTable">
                            <thead>
                            <div class="float-sm-right " style="margin-bottom: 10px; ">
                                 <a href="{{route('users.create')}}" class="btn btn-success btn-icon-split ">
                        <span class="icon text-white-50 ">
                        <i class="fas fa-plus"></i>
                        </span>
                                    <span class="text">Create new user</span>
                                </a>
                            </div>
                            <tr>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Role</th>
                                @if(Illuminate\Support\Facades\Auth::guard('admin')->user()->role->id ==1)
                                    <th scope="col" style="text-align: center">Actions</th>
                                @endif
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($users as $user)
                                <tr>
                                    <td>{{$user->first_name}}</td>
                                    <td>{{$user->last_name}}</td>
                                    <td>{{$user->email }}</td>
                                    <td>{{$user->role->name}}</td>
                                    @if(Illuminate\Support\Facades\Auth::guard('admin')->user()->role->id ==1)
                                        <td>
                                            <div class="row" style="display: flex; justify-content: center;">
                                                <a href="{{route('user.edit.password',$user->id)}}"
                                                   class="btn btn-warning btn-circle mr-1">
                                                    <i class="fas fa-key"></i>
                                                </a>
                                                <a href="{{route('user.edit.info',$user->id)}}"
                                                   class="btn btn-info btn-circle mr-1">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <form action="{{route('user.delete',$user->id)}}"
                                                      method="POST"
                                                      class="float-left">
                                                    {{ method_field('DELETE') }}
                                                    @csrf
                                                    <button
                                                        @if($user->id == Illuminate\Support\Facades\Auth::guard('admin')->user()->id) disabled
                                                        @endif type="submit" class="btn btn-danger btn-circle"><i
                                                            class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                        <div class="pagination justify-content-center ">
                        </div>
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
















































































{{--@section('script')--}}
{{--    <script type="text/javascript">--}}
{{--        function deleteUser(id) {--}}
{{--            const swalWithBootstrapButtons = Swal.mixin({--}}
{{--                customClass: {--}}
{{--                    confirmButton: 'btn btn-success',--}}
{{--                    cancelButton: 'btn btn-danger'--}}
{{--                },--}}
{{--                buttonsStyling: false--}}
{{--            })--}}
{{--            swalWithBootstrapButtons.fire({--}}
{{--                title: 'Are you sure?',--}}
{{--                text: "You won't be able to revert this!",--}}
{{--                icon: 'warning',--}}
{{--                showCancelButton: true,--}}
{{--                confirmButtonText: 'Yes, delete it!',--}}
{{--                cancelButtonText: 'No, cancel!',--}}
{{--                reverseButtons: true--}}

{{--            }).then((result) => {--}}
{{--                if (result.value) {--}}
{{--                    $.ajax({--}}
{{--                        url: 'user/' + id,--}}
{{--                        type: 'delete'--}}
{{--                    });--}}
{{--                    swalWithBootstrapButtons.fire(--}}
{{--                        'Deleted!',--}}
{{--                        'Your file has been deleted.',--}}
{{--                        'success'--}}
{{--                    )--}}
{{--                } else if (--}}
{{--                    /* Read more about handling dismissals below */--}}
{{--                    result.dismiss === Swal.DismissReason.cancel--}}
{{--                ) {--}}
{{--                    swalWithBootstrapButtons.fire(--}}
{{--                        'Cancelled',--}}
{{--                        'Your imaginary file is safe :)',--}}
{{--                        'error'--}}
{{--                    )--}}
{{--                }--}}
{{--            })--}}
{{--            $(document).ajaxStop(function () {--}}
{{--                window.location.reload();--}}
{{--            });--}}

{{--        }--}}

{{--    </script>--}}
{{--    @if (session()->get('passwordUpdated') == true )--}}
{{--        <script type="text/javascript">--}}
{{--            Swal.fire({--}}
{{--                icon: 'success',--}}
{{--                title: 'passwordUpdated',--}}
{{--                text: 'the employee {{session()->get('firstname')}} {{session()->get('lastname')}} password has been updated',--}}

{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}
{{--    @if (session()->get('profileUpdated') == true )--}}
{{--        <script type="text/javascript">--}}
{{--            Swal.fire({--}}
{{--                icon: 'success',--}}
{{--                title: 'profileUpdated',--}}
{{--                text: 'the employee {{session()->get('firstname')}} {{session()->get('lastname')}}  profile has been updated',--}}
{{--                footer: '<a href>Why do I have this issue?</a>'--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}
{{--    @if (session()->get('created') == true )--}}
{{--        <script type="text/javascript">--}}
{{--            Swal.fire({--}}
{{--                icon: 'success',--}}
{{--                title: 'created',--}}
{{--                text: 'the employee {{session()->get('firstname')}} {{session()->get('lastname')}} has been created',--}}
{{--                footer: '<a href>Why do I have this issue?</a>'--}}
{{--            })--}}
{{--        </script>--}}
{{--    @endif--}}
{{--@endsection--}}

