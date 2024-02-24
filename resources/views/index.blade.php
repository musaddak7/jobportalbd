@extends('master') 

@section('content') 
@include ("includes/slider")
<div class="mainsection clear">
  <div class="funcatname clear">
    <h3>Browse Category</h3>
    <hr>
    <div class="row">
      <div class="col-md-6">
        <ul> @foreach($cat->chunk(ceil($cat->count() / 2))->first() as $cati) 
          <li><a href="jobs">{{$cati->name }}</a></li> 
          @endforeach </ul>
      </div>
      <div class="col-md-6">
        <ul> @foreach($cat->chunk(ceil($cat->count() / 2))->last() as $cati) 
        <li><a href="jobs">{{$cati->name }}</a></li>
        @endforeach </ul>
      </div>
    </div>
  </div>
  <div class="govmentjob clear">
    <h3>Gov. Job</h3>
    <hr>
    <div class="row">
      <div class="col-md-6" >
        <ul>
          <li>Assistant Officer-Accounts</li>
          <li>Assistant Officer-Accounts</li>
          <li>Assistant Officer-Accounts</li>
          <li>Assistant Officer-Accounts</li>
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
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory" id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Design &amp; Creative</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory" id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Finance</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory" id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Banking</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory" id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Data Science</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory"id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Marketing</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory"id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Digital Marketing</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory"id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Digital Marketing</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
            <div class="col-lg-4 col-xl-3 col-md-6">
                <div class="single_catagory"id="popularjob">
                    <a href="jobs.html"><h4 class="pb-2">Digital Marketing</h4></a>
                    <p class="mb-0"> <span>50</span> Available position</p>
                </div>
            </div>
        </div>
    </div>
</section>
</div>

 @endsection