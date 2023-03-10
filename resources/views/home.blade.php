@extends('layouts.app_layout')

@section('content')


    <div class="container">
        <br>
        <div class="row">
            <h1 class="col-md-8" >User</h1>
            <div class="col-md-4"><a href="/User/NewUser" class="btn btn-dark" >Create New</a></div>
        </div>



        <table id="selectedColumn" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">

            <thead>
            <tr>
                <th scope="col">Image</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach($users as $user)
                <tr>
                    <td>
                        <img style="height: 50px" class="img-responsive img-rounded" src="{{ asset('images/user.png') }}" alt="User picture">
                    </td>
                    <td>{{$user->name_title}}. {{$user->name}} {{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <a class="btn" href="/User/{{$user->id}}/Edit" style="background-color: #0d56ff;color: white"><i class="fa fa-pencil" aria-hidden="false"></i></a>
                        <a class="btn" id="myBtn" onclick="view_user_data('{{$user->id}}')"  data-toggle="modal" data-target="#user_modal" style="background-color: #000000;color: white"><i class="fa fa-eye" aria-hidden="false"></i></a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>


    <!-- The Modal -->
    <!-- Modal -->
    <div class="modal fade" id="user_modal" tabindex="-1" role="dialog"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: black;color: white">
                    <h5 class="modal-title">User Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true" style="color: white">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <div class="row" style="justify-content: center;">

                        <img style="height: 60px; margin: 10px" class="img-responsive img-rounded" src="{{ asset('images/user.png') }}" alt="User picture">

                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>First Name :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="first_name_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Last Name :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="last_name_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Date Of Birth :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="date_of_birth_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Gender :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="gender_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Remark :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="remark_label"></label>
                        </div>
                    </div>





                </div>
                <div class="modal-footer">
                </div>
            </div>
        </div>
    </div>


@endsection



@section('footer_content')

    <script>



        function view_user_data(user_id){
            $.ajax({
                url: '/User/'+user_id+'/View',
                type: 'get',
                success: function (data) {
                    $("#first_name_label").text(data.name);
                    $("#last_name_label").text(data.last_name);
                    $("#date_of_birth_label").text(data.date_of_birth);
                    $("#gender_label").text(data.gender);
                    $("#remark_label").text(data.remark);

                },
                error: function () {
                    swal("User Data View Fail");
                }
            });
        }


    </script>


@endsection




