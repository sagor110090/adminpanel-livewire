@extends('layouts.app')
@section('title','Profile')
@section('content')


    <form action="{{ url('admin/profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-sm-3 card p-5">
                <div class="text-center">
                    <img src=" {{ auth()->user()->image ? Storage::url(auth()->user()->image) : 'http://ssl.gstatic.com/accounts/ui/avatar_2x.png' }} " class="avatar-profile img-circle img-thumbnail"
                        alt="avatar">
                    <h6>Upload a different photo...</h6>
                    <input type="file" class="text-center center-block file-upload" name="image">
                </div>
            </div>
            <div class="col-md-9">
                <div class=" card p-5">
                    <div class="form-input"> <i class="fa fa-user"></i>
                        <input type="text" required class="form-control" name="name" placeholder="Name"
                            value="{{ auth()->user()->name }}">
                    </div>

                    <div class="form-input"> <i class="fa fa-envelope"></i>
                        <input type="text" required class="form-control" name="email" placeholder="Email address"
                            value="{{ auth()->user()->email }}">
                    </div>
                    <div class="form-input"> <i class="fa fa-angle-double-up"></i>
                         <textarea name="about" id="about" cols="30" rows="10" placeholder="About" class="form-control">{{auth()->user()->about}}</textarea>
                    </div>

                    <div class="form-input"> <i class="fa fa-lock"></i>
                        <input type="password"  class="form-control" name="password" placeholder="Password">
                    </div>

                    <div class="form-input"> <i class="fa fa-lock"></i>
                        <input type="password"  class="form-control" name="password_confirmation"
                            placeholder="Password confirmation">
                    </div>

                    <div>
                        <button type="submit" class="btn btn-primary mt-4 signup">Register</button>

                    </div>

                </div>

            </div>


        </div>

    </form>

@endsection


@push('css')
    <style>
        .avatar-profile {
            vertical-align: middle;
            width: 150px;
            height: 150px !important;
            border-radius: 50%;
        }

        .form-input {
            position: relative;
            margin-bottom: 10px;
            margin-top: 10px
        }

        .form-input i {
            position: absolute;
            font-size: 18px;
            top: 15px;
            left: 10px
        }

        .form-control {
            height: 50px;
            /* background-color: #1c1e21; */
            text-indent: 24px;
            font-size: 15px
        }

        .form-control:focus {
            /* background-color: #25272a; */
            box-shadow: none;
            color: #4f63e7;
            border-color: #4f63e7
        }



    </style>
@endpush

@push('js')
    <script>
        $(document).ready(function() {


            var readURL = function(input) {
                if (input.files && input.files[0]) {
                    var reader = new FileReader();

                    reader.onload = function(e) {
                        $('.avatar').attr('src', e.target.result);
                    }

                    reader.readAsDataURL(input.files[0]);
                }
            }


            $(".file-upload").on('change', function() {
                readURL(this);
            });
        });
    </script>
@endpush
