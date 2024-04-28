@extends('front.layouts.app')

@section('maincontent')
<section class="section-4 bg-2">    
    <div class="container pt-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="/"><i class="fa fa-arrow-left" aria-hidden="true"></i> &nbsp;Back to Jobs</a></li>
                    </ol>
                </nav>
            </div>
        </div> 
    </div>
    <div class="container job_details_area">
        <div class="row pb-5">
            
            <div class="col-md-8">
                <div class="card shadow border-0" style="padding: 20px;">
                    <div class="job_details_header">
                        <div class="single_jobs white-bg d-flex justify-content-between">
                            <div class="jobs_left d-flex align-items-center">
                                
                                <div class="jobs_conetent">
                                   <h2>Gov. Job/</h2>
                                </div>
                            </div>
                            <div class="jobs_right">
                                <div class="apply_now">
                                    <a class="heart_mark" href="#"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="descript_wrap white-bg">
                        <div class="single_wrap">
                            <h3>{{ $gov_jobs->title }}</h3>
                            <h3>{{ $gov_jobs->position }}</h3>
                            <img src="{{URL::asset('uploads/'.$gov_jobs->image)}}" alt="Gov Job Image" width="90%">

                        </div>
                        
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>
@endsection