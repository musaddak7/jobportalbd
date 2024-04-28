@extends('front.layouts.app')
@section('maincontent')
<!--Markup for Banner-->
<section class="banner">
  <div id="myCarousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-touch="true" >
    <div class="carousel-inner"style="height:30rem">
      <div class="carousel-item active">
        <img src="assets/images/banner-2.jpg" class="d-block w-100" alt="Banner image">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner-1.jpg" class="d-block w-100" alt="Banner image">
        <div class="carousel-caption d-none d-md-block">
          <h5>Second slide label</h5>
          <p>Some representative placeholder content for the second slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner-3.jpg" class="d-block w-100" alt="Banner image">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="assets/images/banner-4.jpg" class="d-block w-100" alt="Banner image">
        <div class="carousel-caption d-none d-md-block">
          <h5>Third slide label</h5>
          <p>Some representative placeholder content for the third slide.</p>
        </div>
      </div>


    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

</section>


<section class="section-1 py-5 "> 
    <div class="container">
        <div class="card border-0 shadow p-5">
          <form action="{{route('jobs')}}" method="get">
                <div class="row">
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
                    </div>
                    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                        <select name="category" id="category" class="form-control">
                            <option value="">Select a Category</option>
                            @if($newCategories->isNotEmpty())
                            @foreach($newCategories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                            @endif
                        </select>
                    </div>
                    
                    <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                        <div class="d-grid gap-2">
                            <!-- <a href="#" class="btn btn-primary btn-block">Search</a> -->
                            <button type="submit" class="btn btn-primary btn-block">Search</button>
                        </div>
                        
                    </div>
                </div>  
          </form>          
        </div>
    </div>
</section>


    <!--main content start here-->
<div class="mainsection clear">
<section class="section-3 bg-2 ">
        <div class="container">     
          <div class="row pt-5">
			        <div class="col-md-8 col-lg-9 ">
                    <div class="job_listing_area">                    
                        <div class="job_lists">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        <h3 class="border-0 fs-5 pb-2 mb-0"><i class="fa-solid fa-list"></i>&nbsp;Category</h3>
                                        <p>We are in need of a Web Developer for our company.</p>
                                        <div class="row d-flex">
                                        @foreach($categories->chunk(ceil($categories->count() / 3)) as $chunk)
                                            <div class="col-lg-4">

                                              <ul> 
                                                @foreach($chunk as $category)
                                                <li><a href="{{route('jobs').'?category='.$category->id}}"><i class="fa-solid fa-play"></i>&nbsp;{{ $category->name }}</a></li>
                                                @endforeach
                                                </ul>
                                            </div>
                                            @endforeach
                                      
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                     
                                                     
                        </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-lg-3 sidebar mb-4">
                    <div class="card border-0 shadow p-4">
                        <div class="mb-4">
                            <h3 class="border-0 fs-5 pb-2 mb-0"><i class="fa-solid fa-earth-americas"></i>&nbsp;Gov. Jobs</h3>
                            <p>Find your gov. job here</p>
                            <div class="row">
                            <ul> 
                              @foreach($gov_jobs as $gov_job)
                            <li><a href="{{route('gov_jobs', $gov_job->id)}}"><i class="fa-solid fa-play"></i>&nbsp;{{$gov_job->title}} </a><br/><span>{{$gov_job->source}}</span></li>
                            @endforeach
                            </ul>
                        </div>
                        </div>
    
                                    
                    </div>
                </div>
                
                
            </div>
        </div>
    </section>
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
                    <a href="{{route('jobs').'?category='.$featuredJob->id}}"><h4 class="pb-2">{{$featuredJob->title}}</h4></a>
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



