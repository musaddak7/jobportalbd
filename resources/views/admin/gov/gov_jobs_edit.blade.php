@extends('front.layouts.app')
@section('maincontent')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route("admin.dashboard") }}">Home</a></li>
                        <li class="breadcrumb-item active">Users</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.sidebar')
            </div>
            <div class="col-lg-9">
                
                <div class="card border-0 shadow mb-4">
                    <div class="card-body card-form">
                    <form action="{{ route('gov_job_upload') }}" method="post" id="userForm" name="userForm" enctype="multipart/form-data">
                     @csrf
                    <div class="card-body  p-4">
                        <h3 class="fs-4 mb-1">My Profile</h3>
                        <div class="mb-4">
                            <label for="" class="mb-2">Name*</label>
                            <input type="text" name="title" id="title" placeholder="Enter Name" class="form-control" value="{{$gov_jobs_list->title}}">
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Email*</label>
                            <input type="text" name="position" id="position" placeholder="Enter Email" class="form-control" value="{{$gov_jobs_list->position}}">
                        </div>
                        <div class="mb-4">
                            <label for="" class="mb-2">Designation*</label>
                            <input type="text" name="source" id="source" placeholder="Designation" class="form-control" value="{{$gov_jobs_list->source}}">
                        </div>                       
                        <div class="mb-4">
                            <label for="" class="mb-2">Image*</label>
                            <input type="file" name="file" id="image" placeholder="Designation" class="form-control" value="{{$gov_jobs_list->image}}">
                        </div>                       
                    </div>
                    <div class="card-footer  p-4">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                    </form>
                    </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
<script type="text/javascript">
   
</script>
@endsection