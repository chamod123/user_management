@extends('layouts.app_layout')

@section('content')

    <div class="container">
        <br>
        <div class="row">
            <div class="col-md-6"><a href="/home" class="btn btn-dark">Back</a></div>

        </div>

        <hr>

        <form action="/User/Save" method="POST" enctype="multipart/form-data" id="FormId">

            @csrf


                    <div class="row mb-3">
                        <label for="name_title" class="col-md-4 col-form-label text-md-end">{{ __('Title') }}</label>

                        <div class="col-md-6">

                            <input type="radio" id="mr" name="name_title" value="MR" required>
                            <label for="mr">MR</label><br>
                            <input type="radio" id="mrs" name="name_title" value="MRS">
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
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

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
                            <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

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
                            <input id="date_of_birth" type="date" class="form-control @error('date_of_birth') is-invalid @enderror" name="date_of_birth" value="{{ old('date_of_birth') }}" required autocomplete="date_of_birth" autofocus>

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
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
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
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                        <div class="col-md-6">
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label for="remark" class="col-md-4 col-form-label text-md-end">{{ __('Remark') }}</label>

                        <div class="col-md-6">
                            <textarea id="remark" type="text" class="form-control @error('last_name') is-invalid @enderror" name="remark" value="{{ old('remark') }}" required autocomplete="remark" autofocus></textarea>

                            @error('remark')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>

            <div class="row mb-3">
                <label for="remark" class="col-md-4 col-form-label text-md-end">{{ __('Image 1') }}</label>
                <div class="col-md-6">
                    <input id="img_1" name="img_1"  class="form-control" type="file" accept="image/jpeg">
                </div>
            </div>


            <div class="row mb-3">
                <label for="remark" class="col-md-4 col-form-label text-md-end">{{ __('Image 2') }}</label>
                <div class="col-md-6">
                    <input id="img_2" name="img_2"  class="form-control" type="file"  accept="jpeg">
                </div>
            </div>






            <br>

            <div class="form-group row">
                <button type="submit" class="btn btn-dark" >Save</button>
            </div>


        </form>
    </div>
@endsection

@section('footer_content')
<script>
    $("#date_validation").hide();
    $("#month_validation").hide();

    function dateVlidation() {
        if ($("#date").val() < 0 || $("#date").val() > 31) {
            $("#date_validation").show();
        } else {
            $("#date_validation").hide();
        }
    }

    function monthVlidation() {
        if ($("#month").val() < 0 || $("#month").val() > 12) {
            $("#month_validation").show();
        } else {
            $("#month_validation").hide();
        }
    }
</script>
@endsection
