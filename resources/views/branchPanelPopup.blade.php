<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
        <meta name="author" content="ParkerThemes">
        <link rel="shortcut icon" href="{{asset('custom/img/fav.png')}}">

        <!-- Title -->
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">


        <!-- *************
            ************ Common Css Files *************
        ************ -->
        <!-- Bootstrap css -->
        {!!Html::style('custom/css/bootstrap.min.css')!!}
        
        <!-- Icomoon Font Icons css -->
        {!!Html::style('custom/fonts/style.css')!!}

        <!-- Main css -->
        <!-- {!!Html::style('custom/css/main.css')!!} -->
        {!!Html::style('custom/css/green-main.css')!!}


        <!-- *************
            ************ Vendor Css Files *************
        ************ -->

        <!-- Mega Menu -->
        {!!Html::style('custom/vendor/megamenu/css/megamenu.css')!!}

        <!-- Search Filter JS -->
        {!!Html::style('custom/vendor/search-filter/search-filter.css')!!}
        {!!Html::style('custom/vendor/search-filter/custom-search-filter.css')!!}

        <!-- Data Tables -->
        {!!Html::style('custom/vendor/datatables/dataTables.bs4.css')!!}
        {!!Html::style('custom/vendor/datatables/dataTables.bs4-custom.css')!!}
        {!!Html::style('custom/vendor/datatables/buttons.bs.css')!!}
        <!-- Date Range CSS -->
        {!!Html::style('custom/vendor/daterange/daterange.css')!!}
        <style type="text/css">
            @keyframes zoominoutsinglefeatured {
                0% {
                    transform: scale(1,1);
                }
                50% {
                    transform: scale(1.2,1.2);
                }
                100% {
                    transform: scale(1,1);
                }
            }
            .logo img {
                animation: zoominoutsinglefeatured 1s infinite ;
            }
        </style>
    </head>
    <body>

        <!-- Loading wrapper start -->
        <div id="loading-wrapper">
            <div class="spinner-border"></div>
            Loading...
        </div>
        <!-- Loading wrapper end -->

        <?php
            $baseUrl = URL::to('/');
            $url = Request::path();
            $currencyInfo = DB::table('currency')->where('id', 1)->first();
            if (!Session::has('currency')) {
                Session::put('currency', $currencyInfo->symbol);
            }
        ?>
        <!-- Page wrapper start -->
        <div class="page-wrapper">
            
            <!-- Sidebar wrapper start -->
            <nav class="sidebar-wrapper">

                <!-- Sidebar content start -->
                <div class="sidebar-tabs">
                    <!-- Tabs nav start -->
                    <div class="nav" role="tablist" aria-orientation="vertical" style="width: 150px">
                        <a href="{{URL::To('home')}}" class="logo">
                            <img src="{{asset('custom/img/logo.svg')}}" alt="Uni Pro Admin">
                        </a>
                        {{Auth::user()->name}}
                    </div>
                    <!-- Tabs nav end -->
                </div>
                <!-- Sidebar content end -->
                
            </nav>
            <!-- Sidebar wrapper end -->

            <!-- ************* ************ Main container start ************************** -->
            <div class="main-container" style="padding: 0px 0px 0px 150px;"> 
                <!-- Page header starts -->
                <div class="page-header">
                    
                    <!-- Row start -->
                    <div class="row gutters">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-6 col-9">

                            <!-- Search container start -->
                            <div class="search-container">

                                <!-- Toggle sidebar start -->
                                <div class="toggle-sidebar" id="toggle-sidebar">
                                    <i class="icon-menu"></i>
                                </div>
                                <!-- Toggle sidebar end -->

                                <!-- Mega Menu Start -->
                                <!-- Mega Menu End -->

                                <!-- Search input group start -->
                                <!-- Search input group end -->

                            </div>
                            <!-- Search container end -->

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-3">

                            <!-- Header actions start -->
                            <ul class="header-actions">
                                <li class="dropdown">
                                    <a href="javascript:void(0)" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                        <span class="avatar">
                                            <img src="{{asset('custom/img/user5.png')}}" alt="User Avatar">
                                            <span class="status busy"></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings">
                                        <div class="header-profile-actions">
                                            <a href="href="{{ route('logout') }}"" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="icon-log-out1"></i>Logout</a>

                                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">@csrf</form>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <!-- Header actions end -->

                        </div>
                    </div>
                    <!-- Row end -->                    

                </div>
                <!-- Page header ends -->
                <!-- @yield('content')  -->
                <div class="content-wrapper-scroll">

                <!-- Content wrapper start -->
                <div class="content-wrapper">
                <div class="row">
                  <h4>CHOOSE A SYSTEM</h4>
                  <?php  
                    $admin_all_branches = DB::table('systems')->get();
                  ?>
                  @foreach($admin_all_branches as $branch)
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-12">
                    <a href="{{URL::To('admin-proceed-to-dashboard')}}/{{$branch->id}}" style="cursor: pointer;">
                    <!-- Card start -->
                    <div class="card">
                      <img src="{{asset('custom/img/hr.png')}}" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title">{{$branch->system_name}}</h5>
                        <p class="mb-3 text-light">{{$branch->system_address}}</p>
                      </div>
                    </div>
                    <!-- Card end -->
                    </a>
                  </div>
                  @endforeach
                </div>
              </div>
            </div>

                <!-- App footer start -->
                <div class="app-footer">© BinaryIT <?php echo date('Y')?></div>
                <!-- App footer end -->
            </div>           
            <!-- ************************* Main container end ************************** -->

        </div>
        <!-- Page wrapper end -->

        <!-- *************
            ************ Required JavaScript Files *************
        ************* -->
        <!-- Required jQuery first, then Bootstrap Bundle JS -->
        {!!Html::script('custom/js/jquery.min.js')!!}
        {!!Html::script('custom/js/bootstrap.bundle.min.js')!!}
        {!!Html::script('custom/js/modernizr.js')!!}
        {!!Html::script('custom/js/moment.js')!!}
        
        {!!Html::script('custom/js/webcam.min.js')!!}

        <!-- *************
            ************ Vendor Js Files *************
        ************* -->
        
        <!-- Megamenu JS -->
        {!!Html::script('custom/vendor/megamenu/js/megamenu.js')!!}
        {!!Html::script('custom/vendor/megamenu/js/custom.js')!!}

        <!-- Slimscroll JS -->
        {!!Html::script('custom/vendor/slimscroll/slimscroll.min.js')!!}
        {!!Html::script('custom/vendor/slimscroll/custom-scrollbar.js')!!}

        <!-- Search Filter JS -->
        {!!Html::script('custom/vendor/search-filter/search-filter.js')!!}
        {!!Html::script('custom/vendor/search-filter/custom-search-filter.js')!!}

        <!-- Data Tables -->
        {!!Html::script('custom/vendor/datatables/dataTables.min.js')!!}
        {!!Html::script('custom/vendor/datatables/dataTables.bootstrap.min.js')!!}
        
        <!-- Custom Data tables -->
        {!!Html::script('custom/vendor/datatables/custom/custom-datatables.js')!!}

        <!-- Download / CSV / Copy / Print -->
        {!!Html::script('custom/vendor/datatables/buttons.min.js')!!}
        {!!Html::script('custom/vendor/datatables/jszip.min.js')!!}
        {!!Html::script('custom/vendor/datatables/pdfmake.min.js')!!}
        {!!Html::script('custom/vendor/datatables/vfs_fonts.js')!!}
        {!!Html::script('custom/vendor/datatables/html5.min.js')!!}
        {!!Html::script('custom/vendor/datatables/buttons.print.min.js')!!}

       
        <!-- Main Js Required -->
        {!!Html::script('custom/js/main.js')!!}

        <!-- Date Range JS -->
        {!!Html::script('custom/vendor/daterange/daterange.js')!!}
        {!!Html::script('custom/vendor/daterange/custom-daterange.js')!!}

        <script type="text/javascript">
          $(window).on('load',function(){
              $('#myModal').modal('show');
          });

          $('#myModal').modal({
              backdrop: 'static',
              keyboard: false
          });
        </script>
    </body>
</html>