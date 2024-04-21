<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Job Portal</title>
    <link href="\assets\style.css" rel="stylesheet">
    <link href="\assets\headerstyle.css" rel="stylesheet">


</head>
<body>

<!--Markup for Header-->
<header>
  <div class="top-header">
    <div class="container">
      <div class="row">
        <div class="col-sm-3">
        @if(auth()->check())
          <p>Welcome! {{ Auth::user()->name }}</p>
          @else
          <p>Welcome! Guest</p>
          @endif
        </div>
        <div class="col-sm-6 offset-sm-3">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="/profile">
                <i class="fa-solid fa-user"></i>
                My Account
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa-solid fa-circle-info"></i>
                Contact Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa-solid fa-circle-check"></i>
                About Us
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="fa-solid fa-heart"></i>
                Save Job
              </a>
            </li>
         
          </ul>
        </div>
      </div>

    </div>
  </div>
  <!--nav section start here-->

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
    <a class="navbar-brand mt-2" href="/"><p style="color:#eee;font-weight:700;">Job Portal-BD</p></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#myNav" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="myNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
                <a class="nav-link" href="/createjob">Post Job</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="/jobs">All jobs</a>
            </li>
         
          <li class="nav-item dropdown"> @if(!Auth::check()) <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">SignIn Or LogIn</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="/login">LogIn</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="/register">SignIn</a>
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Admin</a>
                  </li>
                </ul> @else <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#">{{Auth::user()->name}}</a>
                <ul class="dropdown-menu">
                  <li>
                    <a class="dropdown-item" href="/profile">My Account</a>
                  </li>
                </ul> @endif
              </li>

        </ul>
      </div>
    </div>
  </nav>

</header>

@yield("maincontent")


<footer class="footer">
    <div class="container">
      <div class="row">
        <div class="col-sm-4">
          <div class="footer-col">
            <h6>About Shop</h6>
            <ul>
              <li><a href="../ecommerce_for Mobile/about.html">About Us</a></li>
              <li><a href="#">Terms & Condition</a></li>
              <li><a href="../ecommerce_for Mobile/privacypolicy.html">Privacy Policy</a></li>
              <li><a href="#">Refund & Returns</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="footer-col">
            <h6>Get help</h6>
            <ul>
              <li><a href="FAQ.html">FAQ</a></li>
              <li><a href="#">Returns</a></li>
              <li><a href="../ecommerce_for Mobile/frontend/payment-method.html">Payment</a></li>
            </ul>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="footer-col contact-us">
            <h6>Contact Us</h6>
            <button onclick="location.href='contact-us.html';">Contact Us</button>
            <p><Address>Uttara secctor-4,road-4 Dhata-1230</Address></p>
          </div>
        </div>
      </div>
    </div>
  </footer>



<script src="/assets/bootstrap/bootstrap.bundle.min.js"></script>

<script>
  	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});
  
  const myCarouselElement = document.querySelector('#myCarousel')

  const carousel = new bootstrap.Carousel(myCarouselElement, {
    interval:1500,
    touch: true
  })

</script> 
<script src="/assets/js/jquery-3.6.0.min.js"></script>
<script src="/assets/js/instantpages.5.1.0.min.js"></script>
<script src="/assets/js/lazyload.17.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Trumbowyg/2.27.3/trumbowyg.min.js" integrity="sha512-YJgZG+6o3xSc0k5wv774GS+W1gx0vuSI/kr0E0UylL/Qg/noNspPtYwHPN9q6n59CTR/uhgXfjDXLTRI+uIryg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/assets/js/custom.js"></script>

@yield('customJs')
</body>
</html>