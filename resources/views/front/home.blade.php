@extends('front.layouts.app')
@section('maincontent')
<div class="slider">
	  <div id="carouselExampleCaptions" class="carousel slide">
	    <div class="carousel-indicators">
	      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
	      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
	      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
	    </div>
	    <div class="carousel-inner">
	      <div class="carousel-item active">
	        <img src="assets/images/banner-1.jpg" class="d-block w-100" alt="banner-1" style="height:30rem">
	        <div class="carousel-caption d-none d-md-block">
	          <h5>First slide label</h5>
	          <p>Some representative placeholder content for the first slide.</p>
	        </div>
	      </div>
	      <div class="carousel-item">
	        <img src="assets/images/banner-2.jpg" class="d-block w-100" alt="..." style="height:30rem">
	        <div class="carousel-caption d-none d-md-block">
	          <h5>Second slide label</h5>
	          <p>Some representative placeholder content for the second slide.</p>
	        </div>
	      </div>
	      <div class="carousel-item">
	        <img src="assets/images/banner-3.jpg" class="d-block w-100" alt="..." style="height:30rem">
	        <div class="carousel-caption d-none d-md-block">
	          <h5>Third slide label</h5>
	          <p>Some representative placeholder content for the third slide.</p>
	        </div>
	      </div>
	    </div>
	    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
	      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	      <span class="visually-hidden">Previous</span>
	    </button>
	    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
	      <span class="carousel-control-next-icon" aria-hidden="true"></span>
	      <span class="visually-hidden">Next</span>
	    </button>
	  </div>
</div>


    <!--main content start here-->
<div class="mainsection clear">
   <div class="container">
    <div class="row">
        <div class="col-lg-8 col-md-6 card d-flex clear"style="margin-right: 15px;box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);">
       
          <h3 class="fs-4 mb-1" style="padding-left: 33px;padding-top: 20px;"> 
          <i class="fa-solid fa-list"style="margin-right:10px"></i>Job Categories</h3> 
            
            <div class="row d-flex">
            @foreach($categories->chunk(ceil($categories->count() / 3)) as $chunk)
                <div class="col-lg-4 col-md-4 ">

                   <ul> 
                    @foreach($chunk as $category)
                    <li><a href="#"><i class="fa-solid fa-play" style="margin-right:10px"></i>{{ $category->name }}</a></li>
                    @endforeach
                    </ul>
                 </div>
                 @endforeach
           
            </div>
        </div>
        <div class="col-lg-3 col-ms-6 card mb-4 p-3 clear" style="box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);" >
            <h3 class="fs-4 mb-1"style="padding-left: 33px;padding-top: 20px;">Job Details</h3>
            <ul> 
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                <li><a href="jobs"><i class=" mdi mdi-play"></i>Assistant Officer-Accounts</a></li>
                 </ul>

        </div>

    </div>
   </div>
</div>




<div class="mainsecond clear">
<section class="section-2 bg-2 py-5">
    <div class="container">
        <h2>Popular Categories</h2>
        <div class="row pt-3">
          @if($featuredJobs->isNotEmpty())
          @foreach($featuredJobs as $featuredJob)

            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory" id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">{{$featuredJob->title}}</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
          @endforeach  
       @endif
        </div>
    </div>
</section>
</div>
@endsection