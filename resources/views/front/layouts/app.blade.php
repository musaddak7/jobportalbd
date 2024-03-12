<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Portal BD</title> 
    <!--icon link-->
    <link rel="stylesheet" href="assets\style.css">
     <!--bootstrap css link-->
    <link rel="stylesheet" href="assets\bootstrap\bootstrap.min.css">
       <!--bootstrap icons link-->
       <link rel="stylesheet" href="assets\bootstrap\bootstrap-icons.min.css">
    <!--icon link-->
    <link rel="stylesheet" href="assets\icons\css\materialdesignicons.min.css">

       <!--bootstrap js link-->
       <script src="assets\bootstrap\bootstrap.bundle.min.js"> </script>

   
        
   

</head>
<body>
<header>
        <div class="top-header" style="background-color: black;">
        <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5 ">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link icon-color" href="#">Welcome! Mobin</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-7 col-md-5  offset-2">
                        <div class="container d-flex justify-content-end">
                        <ul class="nav">
                        <li class="nav-item">
                        <a class="nav-link" href="#"><i class="mdi mdi-cellphone-android icon-color"></i></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#"><i class="mdi mdi-information icon-color"></i></a> 
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#"><i class="mdi mdi-facebook icon-color"></i></a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#"><i class="mdi mdi-twitter icon-color"></i></a>
                        </li>
                        </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="/">Job Portal-BD</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll" aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
    <form class="d-flex">
      <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success" type="submit">Search</button>
    </form>
</div>
    <div class="collapse navbar-collapse" id="navbarScroll">
         <div class="container">
            <div class="row">
                <ul class="nav justify-content-end">
                    <li class="nav-item">
                    <a class="nav-link" href="/createjob">Post Job</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="/jobs">All jobs</a>
                    </li>
                    <li class="nav-item dropdown">
                        
                           

                            @if(!Auth::check())
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">SignIn Or LogIn</a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/login">LogIn</a></li>
                            <li><a class="dropdown-item" href="/register">SignIn</a></li>
                            <li><a class="dropdown-item" href="#">Admin</a></li>
                            </ul>
                            @else
                            <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">{{Auth::user()->name}}</a>
                            <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/profile">My Account</a></li>
                            </ul>
                            @endif
                            

                           
                    </li>
                </ul>
            </div>
        </div>
    </div>
  </div>
</nav>

 </header>
    @yield("maincontent")



    <div class="footersection">
    <div class="card text-center">
    <div class="card-header">
    <h3> About Jobportal.com.bd</h3>
    </div>
    <div class="card-body">
        
   <h5> About Jobportal</h5></br>
   <h5> Terms & Conditions</h5></br>
   <h5> Other Partners</h5></br> 
   <h5> Privacy Policy</h5></br>
   <h5> Feedback</h5></br>
   <h5> Contact Us</h5></br>
    </div>
    <div class="card-footer text-body-secondary">
        @Jobportal.com.bd
    </div>
    </div>

</div>

   <!--bootstrap js link-->
    <script src="assets\bootstrap\bootstrap.bundle.min.js"> </script>
    <!--js link-->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.5.1.3.min.js') }}"></script>
    <script src="{{ asset('assets/js/instantpages.5.1.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/lazyload.17.6.0.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
@yield('customJs')
</body>
</html>