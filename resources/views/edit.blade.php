@extends('layouts.app_layout')

@section('content')

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-5"><a href="/home" class="btn btn-dark">Back</a></div>
            <h3 class="col-md-6">Update The User</h3>

        </div>

        <hr>

        <form action="/User/Update" method="POST" enctype="multipart/form-data" id="FormId">



            <input hidden value="{{$user->id}}" name="user_no" id="user_no">


            @csrf


            <div class="row mb-3">
                <label for="name_title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                <div class="col-md-6">

                    <input @if($user->name_title == "MR") checked @endif type="radio" id="mr" name="name_title" value="MR" required>
                    <label for="mr">MR</label><br>
                    <input @if($user->name_title == "MRS") checked @endif type="radio" id="mrs" name="name_title" value="MRS">
                    <label for="mrs">MRS</label><br>

                    @error('name_title')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('First Name') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="last_name" class="col-md-4 col-form-label text-md-end">{{ __('Last Name') }}</label>

                <div class="col-md-6">
                    <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{$user->last_name}}" required autocomplete="last_name" autofocus>

                    @error('last_name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="date_of_birth" class="col-md-4 col-form-label text-md-end">{{ __('DOB') }}</label>

                <div class="col-md-6">
                    <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{$user->date_of_birth}}" required autocomplete="date_of_birth" autofocus>

                    @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="gender" class="col-md-4 col-form-label text-md-end">{{ __('Gender') }}</label>

                <div class="col-md-6">
                    <select class="form-control" name="gender">
                        <option @if($user->name_title == "Male") selected @endif  value="Male">Male</option>
                        <option @if($user->name_title == "Female") selected @endif  value="Female">Female</option>
                    </select>
                    @error('gender')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>


            <div class="row mb-3">
                <label for="remark" class="col-md-4 col-form-label text-md-end">{{ __('Remark') }}</label>

                <div class="col-md-6">
                    <textarea id="remark" type="text" class="form-control @error('last_name') is-invalid @enderror" name="remark" value="{{ old('remark') }}" required autocomplete="remark" autofocus>{{$user->remark}}</textarea>

                    @error('remark')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
            </div>



            <br>

            <div class="form-group row">
                <button type="submit" class="btn btn-dark" >Save</button>
            </div>


        </form>
    </div>
@endsection
