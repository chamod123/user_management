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
                        <a class="btn" href="/Client/{{$user->id}}/Edit" style="background-color: #0d56ff;color: white"><i class="fa fa-pencil" aria-hidden="false"></i></a>
                        <a class="btn" onclick="delete_client('{{$user->id}}')" style="background-color: #c71111;color: white"><i class="fa fa-trash" aria-hidden="false"></i></a>
                        <a class="btn" id="myBtn" onclick="view_client_data('{{$user->id}}')"  data-toggle="modal" data-target="#client_modal" style="background-color: #000000;color: white"><i class="fa fa-eye" aria-hidden="false"></i></a>

                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>


    <!-- The Modal -->
    <!-- Modal -->
    <div class="modal fade" id="client_modal" tabindex="-1" role="dialog"aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="background-color: black;color: white">
                    <h5 class="modal-title">Client Details</h5>
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
                            <label>Name :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="name_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Contact :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="contact_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Email Address :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="email_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Date Of Birth :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="dob_label"></label>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4">
                            <label>Address :</label>
                        </div>
                        <div class="col-md-8">
                            <label id="address_label"></label>
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
        function delete_client(client_id){
            swal({
                title: "Are you sure?",
                text: "Do you want to Delete the Selected Client",
                icon: "warning",
                buttons: true,
                dangerMode: true,
                // showCancelButton: true,
                // confirmButtonColor: '#3085d6',
                // cancelButtonColor: '#d33',
                // confirmButtonText: 'Yes, delete it!'
            })
                .then((willDelete) => {
                    if (willDelete) {

                        $.ajax({
                            url: '/Client/'+client_id+'/Delete',
                            type: 'get',
                            data: {},
                            success: function (data) {
                                swal("Client deleted!", {
                                    icon: "success",
                                });
                                location.reload();
                            },
                            error: function () {
                                swal("Client Not Deleted!");
                            }
                        });

                    } else {
                        swal("Client Not Deleted!");
                    }
                });
        }


        function view_client_data(client_id){
            $.ajax({
                url: '/Client/'+client_id+'/View',
                type: 'get',
                success: function (data) {
                    $("#first_name_label").text(data.first_name);
                    $("#last_name_label").text(data.last_name);
                    $("#name_label").text(data.first_name + ' ' + data.last_name);
                    $("#contact_label").text(data.contact);
                    $("#email_label").text(data.email);
                    $("#dob_label").text(data.dob);
                    $("#address_label").text(data.street_no + ', ' + data.street_address + ', ' + data.city);

                },
                error: function () {
                    swal("Client Data View Fail");
                }
            });
        }


    </script>


@endsection




