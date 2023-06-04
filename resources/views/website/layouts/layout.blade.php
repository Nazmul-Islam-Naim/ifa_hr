
<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>@yield('title')</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link rel="shortcut icon" href="favicon.ico">

<!-- Stylesheets -->
{!!Html::style('custom/website/css/animate.css')!!}
{!!Html::style('custom/website/css/bootstrap.css')!!}
<!-- <link rel="stylesheet" href="css/font-awesome.min.css"> -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
{!!Html::style('custom/website/css/owl.carousel.css')!!}
{!!Html::style('custom/website/css/owl.theme.css')!!}
{!!Html::style('custom/website/css/prettyPhoto.css')!!}
{!!Html::style('custom/website/css/smoothness/jquery-ui-1.10.4.custom.min.css')!!}
{!!Html::style('custom/website/rs-plugin/css/settings.css')!!}
{!!Html::style('custom/website/css/theme.css')!!}
{!!Html::style('custom/website/css/colors/turquoise.css')!!}
{!!Html::style('custom/website/css/responsive.css')!!}
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600,700">

<!-- Javascripts --> 
{!!Html::script('custom/website/js/jquery-1.11.0.min.js')!!}
{!!Html::script('custom/website/js/bootstrap.min.js')!!}
{!!Html::script('custom/website/js/bootstrap-hover-dropdown.min.js')!!}
{!!Html::script('custom/website/js/owl.carousel.min.js')!!}
{!!Html::script('custom/website/js/jquery.parallax-1.1.3.js')!!}
{!!Html::script('custom/website/js/jquery.nicescroll.js')!!}
{!!Html::script('custom/website/js/jquery.prettyPhoto.js')!!}
{!!Html::script('custom/website/js/jquery-ui-1.10.4.custom.min.js')!!}
{!!Html::script('custom/website/js/jquery.forms.js')!!}
{!!Html::script('custom/website/js/jquery.sticky.js')!!}
{!!Html::script('custom/website/js/waypoints.min.js')!!}
{!!Html::script('custom/website/js/jquery.isotope.min.js')!!}
{!!Html::script('custom/website/js/jquery.gmap.min.js')!!}
<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
{!!Html::script('custom/website/rs-plugin/js/jquery.themepunch.tools.min.js')!!} 
{!!Html::script('custom/website/rs-plugin/js/jquery.themepunch.revolution.min.js')!!} 
{!!Html::script('custom/website/js/switch.js')!!}
{!!Html::script('custom/website/js/custom.js')!!}
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//https://www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-50960990-1', 'slashdown.nl');
  ga('send', 'pageview');
</script>
</head>

<body>

<!-- Top header -->
<div id="top-header">
  <div class="container">
    <div class="row">
      <div class="col-xs-6">
        <div class="th-text pull-left">
          <div class="th-item"> <a href="#"><i class="fa fa-phone"></i> 05-460789986</a> </div>
          <div class="th-item"> <a href="#"><i class="fa fa-envelope"></i> MAIL@STARHOTEL.COM </a></div>
        </div>
      </div>
      <div class="col-xs-6">
        <div class="th-text pull-right">
          <div class="th-item">
            <div class="btn-group">
              <button class="btn btn-default btn-xs dropdown-toggle js-activated" type="button" data-toggle="dropdown"> <i class="fa fa-user-o"></i> <span class="caret"></span> </button>
              <ul class="dropdown-menu">
                @if((Auth::check() && Auth::user()->user_type == 4) || (Auth::check() && Auth::user()->user_type == 5))
                <li><a href="{{URL::To('/home')}}">Dashboard</a></li>
                <li><a href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                @else
                <li><a href="{{route('login')}}">Login</a></li>
                @endif
              </ul>
            </div>
          </div>
          <div class="th-item">
            <div class="social-icons"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-youtube-play"></i></a> </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
  $url = Request::path();
?>
<!-- Header -->
<header>
  <!-- Navigation -->
  <div class="navbar yamm navbar-default" id="sticky">
    <div class="container">
      <div class="navbar-header">
        <button type="button" data-toggle="collapse" data-target="#navbar-collapse-grid" class="navbar-toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        <a href="{{URL::To('/')}}" class="navbar-brand">         
        <!-- Logo -->
        <div id="logo"> <img id="default-logo" src="{{asset('custom/website/images/logo.png')}}" alt="Starhotel" style="height:44px;"> <img id="retina-logo" src="{{asset('custom/website/images/logo-retina.png')}}" alt="Starhotel" style="height:44px;"> </div>
        </a> </div>
      <div id="navbar-collapse-grid" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="dropdown {{($url=='/') ? 'active':''}}"> <a href="{{URL::To('/')}}">Home</a>
          </li>
          <li class="dropdown {{($url=='room-list') ? 'active':''}}"> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Rooms<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="{{($url=='room-list') ? 'active':''}}"><a href="{{URL::To('room-list')}}">Room List</a></li>
            </ul>
          </li>
          <li class="dropdown {{($url=='package-list') ? 'active':''}}"> <a href="#" data-toggle="dropdown" class="dropdown-toggle js-activated">Dining<b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li class="{{($url=='package-list') ? 'active':''}}"><a href="{{URL::To('package-list')}}">Package List</a></li>
            </ul>
          </li>
          <li class="{{($url=='gallery') ? 'active':''}}"> <a href="{{URL::To('gallery')}}">Gallery</a></li>
          <li class="{{($url=='contact') ? 'active':''}}"> <a href="{{URL::To('contact')}}">Conatct</a></li>
        </ul>
      </div>
    </div>
  </div>
</header>
@yield('content') 
<!-- Footer -->
<footer>
<div class="container">
  <div class="row">
    <div class="col-md-3 col-sm-3">
      <h4>About Starhotel</h4>
      <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpat. <br>
        <br>
        Nunc ut fringilla urna. Cras vel adipiscing ipsum. Integer dignissim nisl eu lacus interdum facilisis. Aliquam erat volutpat. Nulla semper vitae felis vitae dapibus. </p>
    </div>
    <div class="col-md-3 col-sm-3">
      <h4>Recieve our newsletter</h4>
      <p>Suspendisse sed sollicitudin nisl, at dignissim libero. Sed porta tincidunt ipsum, vel volutpa!</p>
      <form role="form">
        <div class="form-group">
          <input name="newsletter" type="text" id="newsletter" value="" class="form-control" placeholder="Please enter your E-mailaddress">
        </div>
        <button type="submit" class="btn btn-lg btn-black btn-block">Submit</button>
      </form>
    </div>
    <div class="col-md-3 col-sm-3">
      <h4>From our blog</h4>
        <ul>        
        <li>
          <article>
            <a href="blog-post.html">This is a video post<br>April 15 2014</a>
          </article>
        </li>
        <li>
          <article>
            <a href="blog-post.html">An image post<br>April 14 2014</a>
          </article>
        </li>
        <li>
          <article>
            <a href="blog-post.html">Audio included post<br>April 12 2014</a>
          </article>
        </li>
        </ul>
    </div>
    <div class="col-md-3 col-sm-3">
      <h4>Address</h4>
      <address>
      <strong>Starhotel</strong><br>
      795 Las Palmas<br>
      Spain, CA 94107<br>
      <abbr title="Phone">P:</abbr> <a href="#">(123) 456-7890</a><br>
      <abbr title="Email">E:</abbr> <a href="#">mail@example.com</a><br>
      <abbr title="Website">W:</abbr> <a href="#">www.slashdown.nl</a><br>
      </address>
    </div>
  </div>
</div>
<div class="footer-bottom">
<div class="container">
<div class="row">
<div class="col-xs-6"> &copy; {{date('Y')}} Smart Hostel All Rights Reserved </div>
<div class="col-xs-6 text-right">
<ul>
<li><a href="{{URL::To('contact')}}">Contact</a></li>
</ul>
</div>
</div>
</div>
</div>
</footer>

<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

</body>
</html>