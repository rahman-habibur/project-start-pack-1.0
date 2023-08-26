@extends('admin.admin_master')


@section('page-content')
<script src="{{asset('backend')}}/assets/js/jquery-3.7.0.min.js"></script>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Edit Profile</h4>
                        <hr>
                        <form method="POST" action="{{route('store.profile')}}" enctype="multipart/form-data">
                            @csrf 
                            <div class="row my-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Artisanal kale" id="name"
                                        name="name" value="{{$editdata->name}}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row my-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Username</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" placeholder="Artisanal kale" id="username"
                                        name="username" value="{{$editdata->username}}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row my-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="email" placeholder="Artisanal kale" id="email"
                                        name="email" value="{{$editdata->email}}">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row my-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Profile Image</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" placeholder="Artisanal kale" id="image"
                                        name="image">
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row my-3">
                                <div class="col-sm-12 text-center">
                                    <div class="">
                                        <img id="showImage" src="{{ (!empty($editdata->profile_image))? url('uploads/admin_images/'.$editdata->profile_image): url('uploads/no_image.jpg') }}"
                                            alt="" class="rounded avatar-lg">
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                            <div class="row my-3">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Update Profile">
                                </div>
                            </div>
                            <!-- end row -->
                        </form>

                    </div>
                </div>
            </div> <!-- end col -->
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src', e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        })
    })
</script>
@endsection
