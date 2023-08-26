@extends('admin.admin_master')


@section('page-content')
<script src="{{asset('backend')}}/assets/js/jquery-3.7.0.min.js"></script>
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title text-center">Change Password</h4>
                        <hr>

                        @if(count($errors))
                            @foreach ($errors->all() as $error)
                                <p class="alert alert-danger alert-dismissible fade show">{{$error}}</p>
                            @endforeach
                        @endif

                        <form method="POST" action="{{ route('admin.changes.update') }}" enctype="multipart/form-data">
                            @csrf 
                            <!-- old password  -->
                            <div class="row my-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Old Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" placeholder="Old Password" id="name"
                                        name="old_password" value="">
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- new password  -->
                            <div class="row my-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">New Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" placeholder="New Password" id="new_password"
                                        name="new_password" value="">
                                </div>
                            </div>
                            <!-- end row -->
                            <!-- confirm password  -->
                            <div class="row my-3">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Confirm Password</label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="password" placeholder="Confirm password" id="name"
                                        name="confirm_password" value="">
                                </div>
                            </div>
                            <!-- end row -->
                           
                          
                            <div class="row my-3">
                                <div class="col-sm-12 text-center">
                                    <input type="submit" class="btn btn-info waves-effect waves-light" value="Change Password">
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
