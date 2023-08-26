@extends('admin.admin_master')


@section('page-content')
<div class="page-content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <center>
                        <img src="{{ (!empty($data->profile_image))? url('uploads/admin_images/'.$data->profile_image): url('uploads/no_image.jpg') }}" alt="" class="rounded-circle text-center avatar-lg mt-3">
                        <p class="mt-2 mb-lg-0"><code><span class="text-muted"><i class="ri-record-circle-line align-middle font-size-14 text-success"></i> Online</span></code></p>
                    </center>
                    <div class="card-body">
                        <h5 class="card-title"><span>Name:</span> {{ $data->name }}</h5>
                        <hr>
                        <h5 class="card-title"><span>Username:</span> {{ $data->username }}</h5>
                        <hr>
                        <h5 class="card-title"><span>Email:</span> {{ $data->email }}</h5> 
                        <hr>
                        <center>
                            <a href="{{route('edit.profile')}}" class="btn btn-info waves-effect waves-light">Edit Profile <i class="ri-arrow-right-line align-middle ms-2"></i> </a>  
                        </center>
                    </div>
                </div>
            </div>
            <div class="col-lg-6"></div>
        </div>



        @endsection
