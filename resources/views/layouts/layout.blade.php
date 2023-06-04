<!doctype html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Meta -->
        <meta name="description" content="Responsive Bootstrap4 Dashboard Template">
        <meta name="author" content="ParkerThemes">
        <link rel="shortcut icon" href="{{asset('logo/logo.png')}}">
        <link href="https://fonts.maateen.me/adorsho-lipi/font.css" rel="stylesheet">

        <!-- Title -->
        <title>@yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {!!Html::style('custom/css/employee-card.css')!!}
        <!-- *************
            ************ Common Css Files *************
        ************ -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.css">
        <!-- Bootstrap css -->
        {!!Html::style('custom/css/bootstrap.min.css')!!}
        
        <!-- Icomoon Font Icons css -->
        {!!Html::style('custom/fonts/style.css')!!}

        <?php 
        $checkThemeforUser=DB::table('theme_setting')->where('user_id', Auth::id())->first();
        ?>
        @if($checkThemeforUser->theme_id == 1)
        <!-- Main css for blue -->
        {!!Html::style('custom/css/main.css')!!}
        @elseif($checkThemeforUser->theme_id == 2)
        <!-- Main css for dark -->
        {!!Html::style('custom/css/dark-main.css')!!}
        @elseif($checkThemeforUser->theme_id == 3)
        <!-- Main css for green -->
        {!!Html::style('custom/css/green-main.css')!!}
        @elseif($checkThemeforUser->theme_id == 4)
        <!-- Main css for red -->
        {!!Html::style('custom/css/red-main.css')!!}
        @elseif($checkThemeforUser->theme_id == 5)
        <!-- Main css for violet -->
        {!!Html::style('custom/css/violet-main.css')!!}
        @endif


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

        <!--summer note css -->
        {!!Html::style('custom/vendor/summernote/summernote-bs4.css')!!}

        
        <!-- Bootstrap Select CSS -->
        {!!Html::style('custom/vendor/bs-select/bs-select.css')!!}

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
            body {
                font-family: 'AdorshoLipi', Arial, sans-serif !important;
            }
            table.dataTable thead th{
                font-weight: 100;
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
                    @if(Auth::user()->user_type == 1 || Auth::user()->user_type == 2 || Auth::user()->user_type == 3)
                    <!-- Tabs nav start -->
                    <div class="nav" role="tablist" aria-orientation="vertical">
                        <a href="{{URL::To('home')}}" class="logo">
                            <img src="{{asset('logo/logo.png')}}" alt="Uni Pro Admin">
                        </a>
                        <a class="nav-link {{($url=='home' || $url==config('app.account').'/daily-transaction' || $url==config('app.account').'/final-report' || $url==config('app.or').'/receive-voucher-report' || $url==config('app.op').'/payment-voucher-report' || $url==config('app.hc').'/room-list-report' || $url==config('app.em').'/employee-salary' || $url==config('app.dash').'/workstation-list' || $url==config('app.dash').'/department-list' || $url==config('app.dash').'/designation-list' || $url==(request()->is(config('app.dash').'/workstation-employee-list/*')) || $url==(request()->is(config('app.dash').'/department-employee-list/*')) || $url==(request()->is(config('app.dash').'/designation-employee-list/*'))) ? 'active':''}}" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">
                            <i class="icon-home2"></i>
                            <span class="nav-link-text">ড্যাসবোর্ড </span>
                        </a>
                        <!--<a class="nav-link {{($url==config('app.account').'/account-type' || $url==(request()->is(config('app.account').'/account-type/*/edit')) || $url==config('app.account').'/bank-account' || $url==config('app.account').'/cheque-book' || $url==config('app.account').'/cheque-no' || $url==(request()->is(config('app.account').'/bank-deposit/*')) || $url==(request()->is(config('app.account').'/amount-withdraw/*')) || $url==(request()->is(config('app.account').'/amount-transfer/*')) || $url==(request()->is(config('app.account').'/bank-report/*')) || $url==config('app.or').'/receive-type' || $url==config('app.or').'/receive-sub-type' || $url==config('app.or').'/receive-voucher' || $url==config('app.op').'/payment-type' || $url==config('app.op').'/payment-sub-type' || $url==config('app.op').'/payment-voucher') ? 'active':''}}" id="account-tab" data-bs-toggle="tab" href="#tab-account" role="tab" aria-controls="tab-account" aria-selected="false">
                            <i class="icon-dollar-sign"></i>
                            <span class="nav-link-text">Accounts</span>
                        </a>-->
                        <a class="nav-link {{($url==config('app.cat').'/department' || $url==(request()->is(config('app.cat').'/department/*/edit')) || $url==config('app.cat').'/designation' || $url==(request()->is(config('app.cat').'/designation/*/edit')) || $url==config('app.cat').'/salary-scale' || $url==(request()->is(config('app.cat').'/salary-scale/*/edit')) || $url==config('app.cat').'/district' || $url==(request()->is(config('app.cat').'/district/*/edit')) || $url==config('app.cat').'/workstation' || $url==(request()->is(config('app.cat').'/workstation/*/edit')) || $url==config('app.cat').'/apply-leave' || $url==config('app.cat').'/manage-holiday' || $url==config('app.cat').'/daily-attendance') ? 'active':''}}" id="catalog-tab" data-bs-toggle="tab" href="#tab-catalog" role="tab" aria-controls="tab-catalog" aria-selected="false">
                            <i class="icon-view_column"></i>
                            <span class="nav-link-text">ক্যাটালগ</span>
                        </a>
                        <a class="nav-link {{($url==config('app.hr').'/employee-list' || $url==config('app.hr').'/employee-list/create' || $url==(request()->is(config('app.hr').'/employee-list/*/edit')) || $url==(request()->is(config('app.hr').'/employee-pofile/*')) || $url==config('app.hr').'/employee-transfer' || $url==(request()->is(config('app.hr').'/transfer-form/*')) || $url==(request()->is(config('app.hr').'/employee-transferred-history/*')) || $url==config('app.hr').'/employee-transferred-list' || $url==(request()->is(config('app.hr').'/employee-transferred-list/*')) || $url==(request()->is(config('app.hr').'/employee-transfer-application/*')) || $url==config('app.hr').'/employee-transfer-application-list' || $url==(request()->is(config('app.hr').'/employee-pension-prl/*'))  || $url==config('app.hr').'/employee-pension-prl-list' || $url==config('app.hr').'/apply-leave' || $url==config('app.hr').'/manage-holiday' || $url==config('app.hr').'/daily-attendance') ? 'active':''}}" id="hotelconfiguration-tab" data-bs-toggle="tab" href="#tab-hotelconfiguration" role="tab" aria-controls="tab-hotelconfiguration" aria-selected="false">
                            <i class="icon-view_column"></i>
                            <span class="nav-link-text">মানব সম্পদ </span>
                        </a>
                       
                        <a class="nav-link {{($url==config('app.user').'/user-list' || $url==config('app.user').'/user-list/create' || $url==(request()->is(config('app.user').'/user-list/*/edit'))) ? 'active':''}}" id="userconfiguration-tab" data-bs-toggle="tab" href="#tab-userconfiguration" role="tab" aria-controls="tab-userconfiguration" aria-selected="false">
                            <i class="icon-user"></i>
                            <span class="nav-link-text">ব্যাবহারকারি</span>
                        </a>
                        <a class="nav-link {{($url==config('app.rb').'/deleted-department-list' || $url==config('app.rb').'/deleted-designation-list' || $url==config('app.rb').'/deleted-district-list' || $url==config('app.rb').'/deleted-workstation-list' || $url==config('app.rb').'/deleted-salaryscale-list') ? 'active':''}}" id="recyclebinconfiguration-tab" data-bs-toggle="tab" href="#tab-recyclebinconfiguration" role="tab" aria-controls="tab-recyclebinconfiguration" aria-selected="false">
                            <i class="icon-trash"></i>
                            <span class="nav-link-text">রিসাইকেল বিন</span>
                        </a>
                        <a class="nav-link settings" id="settings-tab" data-bs-toggle="tab" href="#tab-settings" role="tab" aria-controls="tab-settings" aria-selected="false">
                            <i class="icon-settings1"></i>
                            <span class="nav-link-text">সেটিংস</span>
                        </a>
                    </div>
                    <!-- Tabs nav end -->

                    <!-- Tabs content start -->
                    <div class="tab-content">
                        <!-- Dasboard tab -->
                        <div class="tab-pane fade {{($url=='home' || $url==config('app.account').'/daily-transaction' || $url==config('app.account').'/final-report' || $url==config('app.or').'/receive-voucher-report' || $url==config('app.op').'/payment-voucher-report' || $url==config('app.em').'/employee-salary' || $url==config('app.hc').'/room-list-report' || $url==config('app.dash').'/workstation-list' || $url==config('app.dash').'/department-list' || $url==config('app.dash').'/designation-list' || $url==(request()->is(config('app.dash').'/workstation-employee-list/*')) || $url==(request()->is(config('app.dash').'/department-employee-list/*')) || $url==(request()->is(config('app.dash').'/designation-employee-list/*'))) ? 'show active':''}}" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                ড্যাসবোর্ড 
                            </div>
                            <!-- Tab content header end -->
                            <!-- Sidebar menu starts -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-menu">
                                    <ul>
                                        <li>
                                            <a href="{{URL::To('home')}}" class="{{($url=='home') ? 'current-page':''}}">ড্যাসবোর্ড</a>
                                        </li>
                                        <!--<li class="list-heading">Reports</li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.account').'/daily-transaction'}}"  class="{{($url==config('app.account').'/daily-transaction') ? 'current-page':''}}">Daily Transaction</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.account').'/final-report'}}" class="{{($url==config('app.account').'/final-report') ? 'current-page':''}}">Final Balance</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.or').'/receive-voucher-report'}}" class="{{($url==config('app.or').'/receive-voucher-report') ? 'current-page':''}}">Receive Voucher Report</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.op').'/payment-voucher-report'}}" class="{{($url==config('app.op').'/payment-voucher-report') ? 'current-page':''}}">Payment Voucher Report</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.em').'/employee-salary'}}" class="{{($url==config('app.em').'/employee-salary') ? 'current-page':''}}">Employee Salary Report</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hc').'/room-list-report'}}" class="{{($url==config('app.hc').'/room-list-report') ? 'current-page':''}}">Room Availability Report</a>
                                        </li>-->
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar menu ends -->
                        </div>

                        <!-- Account tab -->
                        <div class="tab-pane fade {{($url==config('app.account').'/account-type' || $url==(request()->is(config('app.account').'/account-type/*/edit')) || $url==config('app.account').'/bank-account' || $url==config('app.account').'/cheque-book' || $url==config('app.account').'/cheque-no' || $url==(request()->is(config('app.account').'/bank-deposit/*')) || $url==(request()->is(config('app.account').'/amount-withdraw/*')) || $url==(request()->is(config('app.account').'/amount-transfer/*')) || $url==(request()->is(config('app.account').'/bank-report/*')) || $url==config('app.or').'/receive-type' || $url==config('app.or').'/receive-sub-type' || $url==config('app.or').'/receive-voucher' || $url==config('app.op').'/payment-type' || $url==config('app.op').'/payment-sub-type' || $url==config('app.op').'/payment-voucher') ? 'show active':''}}" id="tab-account" role="tabpanel" aria-labelledby="account-tab">
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                Accounts
                            </div>
                            <!-- Tab content header end -->

                            <!-- Sidebar menu starts -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-settings">
                                    <div class="accordion" id="bankAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="bankInfo">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#bankCollapse" aria-expanded="true" aria-controls="bankCollapse">
                                                    Bank Accounts
                                                </button>
                                            </h2>
                                            <div id="bankCollapse" class="accordion-collapse collapse {{($url==config('app.account').'/account-type' || $url==(request()->is(config('app.account').'/account-type/*/edit')) || $url==config('app.account').'/bank-account' || $url==config('app.account').'/cheque-book' || $url==config('app.account').'/cheque-no' || $url==(request()->is(config('app.account').'/bank-deposit/*')) || $url==(request()->is(config('app.account').'/amount-withdraw/*')) || $url==(request()->is(config('app.account').'/amount-transfer/*')) || $url==(request()->is(config('app.account').'/bank-report/*'))) ? 'show':''}}" aria-labelledby="bankInfo" data-bs-parent="#bankAccordion">
                                                <div class="accordion-body">
                                                    <div class="sidebar-menu">
                                                        <ul>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.account').'/account-type'}}" class="{{($url==config('app.account').'/account-type' || $url==(request()->is(config('app.account').'/account-type/*/edit'))) ? 'current-page':''}}">Account Type</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.account').'/bank-account'}}" class="{{($url==config('app.account').'/bank-account' || $url==(request()->is(config('app.account').'/bank-deposit/*')) || $url==(request()->is(config('app.account').'/amount-withdraw/*')) || $url==(request()->is(config('app.account').'/amount-transfer/*')) || $url==(request()->is(config('app.account').'/bank-report/*'))) ? 'current-page':''}}">Bank Account</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.account').'/cheque-book'}}" class="{{($url==config('app.account').'/cheque-book') ? 'current-page':''}}">Cheque Book</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.account').'/cheque-no'}}" class="{{($url==config('app.account').'/cheque-no') ? 'current-page':''}}">Cheque No</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="otherReceiveInfo">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#otherReceiveCollapse" aria-expanded="true" aria-controls="otherReceiveCollapse">
                                                    Other Receive
                                                </button>
                                            </h2>
                                            <div id="otherReceiveCollapse" class="accordion-collapse collapse {{($url==config('app.or').'/receive-type' || $url==config('app.or').'/receive-sub-type' || $url==config('app.or').'/receive-voucher') ? 'show':''}}" aria-labelledby="otherReceiveInfo" data-bs-parent="#bankAccordion">
                                                <div class="accordion-body">
                                                    <div class="sidebar-menu">
                                                        <ul>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.or').'/receive-type'}}" class="{{($url==config('app.or').'/receive-type') ? 'current-page':''}}">Receive Type</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.or').'/receive-sub-type'}}" class="{{($url==config('app.or').'/receive-sub-type') ? 'current-page':''}}">Receive Sub Type</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.or').'/receive-voucher'}}" class="{{($url==config('app.or').'/receive-voucher') ? 'current-page':''}}">Receive Voucher</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="otherPaymentInfo">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#otherPaymentCollapse" aria-expanded="true" aria-controls="otherPaymentCollapse">
                                                    Other Payment
                                                </button>
                                            </h2>
                                            <div id="otherPaymentCollapse" class="accordion-collapse collapse {{($url==config('app.op').'/payment-type' || $url==config('app.op').'/payment-sub-type' || $url==config('app.op').'/payment-voucher') ? 'show':''}}" aria-labelledby="otherPaymentInfo" data-bs-parent="#bankAccordion">
                                                <div class="accordion-body">
                                                    <div class="sidebar-menu">
                                                        <ul>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.op').'/payment-type'}}" class="{{($url==config('app.op').'/payment-type') ? 'current-page':''}}">Payment Type</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.op').'/payment-sub-type'}}" class="{{($url==config('app.op').'/payment-sub-type') ? 'current-page':''}}">Payment Sub Type</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{$baseUrl.'/'.config('app.op').'/payment-voucher'}}" class="{{($url==config('app.op').'/payment-voucher') ? 'current-page':''}}">Payment Voucher</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                        
                                    </div>
                                </div>
                            </div>
                            <!-- Sidebar menu ends -->
                        </div>

                        <!-- Hotel Catelog tab -->
                        <div class="tab-pane fade {{($url==config('app.cat').'/department' || $url==(request()->is(config('app.cat').'/department/*/edit')) || $url==config('app.cat').'/designation'|| $url==(request()->is(config('app.cat').'/designation/*/edit')) || $url==config('app.cat').'/salary-scale'|| $url==(request()->is(config('app.cat').'/salary-scale/*/edit')) || $url==config('app.cat').'/district'|| $url==(request()->is(config('app.cat').'/district/*/edit')) || $url==config('app.cat').'/workstation'|| $url==(request()->is(config('app.cat').'/workstation/*/edit'))) ? 'show active':''}}" id="tab-catalog" role="tabpanel" aria-labelledby="catalog-tab">
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                {{-- Catalog --}}ক্যাটালগ
                            </div>
                            <!-- Tab content header end -->

                            <!-- Sidebar menu starts -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-menu">
                                    <ul>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.cat').'/department'}}" class="{{($url==config('app.cat').'/department' || $url==config('app.cat').'/department/create' || $url==(request()->is(config('app.cat').'/department/*/edit'))) ? 'current-page':''}}"> ডিপার্টমেন্ট</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.cat').'/designation'}}" class="{{($url==config('app.cat').'/designation' || $url==config('app.cat').'/designation/create' || $url==(request()->is(config('app.cat').'/designation/*/edit'))) ? 'current-page':''}}"> পদবী</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.cat').'/salary-scale'}}" class="{{($url==config('app.cat').'/salary-scale' || $url==config('app.cat').'/salary-scale/create' || $url==(request()->is(config('app.cat').'/salary-scale/*/edit'))) ? 'current-page':''}}"> বেতন স্কেল </a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.cat').'/district'}}" class="{{($url==config('app.cat').'/district' || $url==config('app.cat').'/district/create' || $url==(request()->is(config('app.cat').'/district/*/edit'))) ? 'current-page':''}}">জেলা </a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.cat').'/workstation'}}" class="{{($url==config('app.cat').'/workstation' || $url==config('app.cat').'/workstation/create' || $url==(request()->is(config('app.cat').'/workstation/*/edit'))) ? 'current-page':''}}">কর্মস্থল</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar menu ends -->
                        </div>
                        <!-- Hotel employee tab -->
                        <div class="tab-pane fade {{($url==config('app.hr').'/employee-list' || $url==config('app.hr').'/employee-list/create' || $url==(request()->is(config('app.hr').'/employee-list/*/edit')) || $url==(request()->is(config('app.hr').'/employee-pofile/*')) || $url==config('app.hr').'/employee-transfer' || $url==(request()->is(config('app.hr').'/transfer-form/*')) || $url==(request()->is(config('app.hr').'/employee-transferred-history/*')) || $url==(request()->is(config('app.hr').'/employee-transferred-list/*')) || $url==(request()->is(config('app.hr').'/employee-transfer-application/*')) || $url==config('app.hr').'/employee-transferred-list' || $url==config('app.hr').'/employee-transfer-application-list' || $url==(request()->is(config('app.hr').'/employee-transfer-application-print/*'))  || $url==(request()->is(config('app.hr').'/employee-transfer-application-edit/*'))|| $url==(request()->is(config('app.hr').'/employee-pension-prl/*')) || $url==config('app.hr').'/employee-pension-prl-list' || $url==(request()->is(config('app.hr').'/employee-pension-prl-history/*')) || $url==(request()->is(config('app.hr').'/employee-pension-prl-edit/*')) || $url==config('app.hr').'/apply-leave' || $url==config('app.hr').'/manage-holiday' || $url==config('app.hr').'/daily-attendance') ? 'show active':''}}" id="tab-hotelconfiguration" role="tabpanel" aria-labelledby="hotelconfiguration-tab">
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                মানব সম্পদ 
                            </div>
                            <!-- Tab content header end -->

                            <!-- Sidebar menu starts -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-menu">
                                    <ul>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/employee-list'}}" class="{{($url==config('app.hr').'/employee-list' || $url==config('app.hr').'/employee-list/create' || $url==(request()->is(config('app.hr').'/employee-list/*/edit')) || $url==(request()->is(config('app.hr').'/employee-pofile/*'))) ? 'current-page':''}}"> কর্মচারী ডিরেক্টরি</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/employee-transfer'}}" class="{{($url==config('app.hr').'/employee-transfer' || $url==config('app.hr').'/employee-transfer/create' || $url==(request()->is(config('app.hr').'/employee-transfer/*/edit')) || $url==(request()->is(config('app.hr').'/employee-transfer/*'))  || $url==(request()->is(config('app.hr').'/transfer-form/*')) || $url==(request()->is(config('app.hr').'/employee-pension-prl/*'))) ? 'current-page':''}}"> কর্মচারী স্থানান্তর/পেনশন/পি আর এল</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/employee-transferred-list'}}" class="{{($url==config('app.hr').'/employee-transferred-list' || $url==config('app.hr').'/employee-transferred-list/create' || $url==(request()->is(config('app.hr').'/employee-transferred-list/*/edit')) || $url==(request()->is(config('app.hr').'/employee-transferred-list/*'))) ? 'current-page':''}}"> কর্মচারী স্থানান্তর তালিকা</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/employee-pension-prl-list'}}" class="{{($url==config('app.hr').'/employee-pension-prl-list' || $url==config('app.hr').'/employee-pension-prl-list/create' || $url==(request()->is(config('app.hr').'/employee-pension-prl-list/*/edit')) || $url==(request()->is(config('app.hr').'/employee-pension-prl-list/*'))) ? 'current-page':''}}"> কর্মচারী পেনশন/পি আর এল তালিকা</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/employee-transfer-application-list'}}" class="{{($url==config('app.hr').'/employee-transfer-application-list' || $url==config('app.hr').'/employee-transfer-application-list/create' || $url==(request()->is(config('app.hr').'/employee-transfer-application-list/*/edit')) || $url==(request()->is(config('app.hr').'/employee-transfer-application-list/*'))) ? 'current-page':''}}"> কর্মচারী স্থানান্তর আবেদন পত্র</a>
                                        </li>
                                        <!--<li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/apply-leave'}}" class="{{($url==config('app.hr').'/apply-leave') ? 'current-page':''}}"> Apply Leave</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/manage-holiday'}}" class="{{($url==config('app.hr').'/manage-holiday') ? 'current-page':''}}"> Manage Holiday</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.hr').'/daily-attendance'}}" class="{{($url==config('app.hr').'/daily-attendance') ? 'current-page':''}}"> Daily Attendance</a>
                                        </li> -->
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar menu ends -->
                        </div>
                        <!-- User Configuration tab -->
                        <div class="tab-pane fade {{($url==config('app.user').'/user-list' || $url==config('app.user').'/user-list/create' || $url==(request()->is(config('app.user').'/user-list/*/edit'))) ? 'show active':''}}" id="tab-userconfiguration" role="tabpanel" aria-labelledby="userconfiguration-tab">
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                ব্যাবহারকারি
                            </div>
                            <!-- Tab content header end -->

                            <!-- Sidebar menu starts -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-menu">
                                    <ul>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.user').'/user-list'}}" class="{{($url==config('app.user').'/user-list' || $url==config('app.user').'/user-list/create' || $url==(request()->is(config('app.user').'/user-list/*/edit'))) ? 'current-page':''}}">ব্যাবহারকারি</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar menu ends -->
                        </div>                        
                        <!-- Recycle Bin Configuration tab -->
                        <div class="tab-pane fade {{($url==config('app.rb').'/deleted-department-list' || $url==(request()->is(config('app.rb').'/deleted-department-restore/*')) || $url==config('app.rb').'/deleted-designation-list' || $url==config('app.rb').'/deleted-district-list' || $url==config('app.rb').'/deleted-workstation-list' || $url==config('app.rb').'/deleted-salaryscale-list') ? 'show active':''}}" id="tab-recyclebinconfiguration" role="tabpanel" aria-labelledby="recyclebinconfiguration-tab">
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                               রিসাইকেল বিন
                            </div>
                            <!-- Tab content header end -->

                            <!-- Sidebar menu starts -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-menu">
                                    <ul>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.rb').'/deleted-department-list'}}" class="{{($url==config('app.rb').'/deleted-department-list'  || $url==(request()->is(config('app.rb').'/deleted-department-restore/*')) || $url==(request()->is(config('app.rb').'/deleted-department-delete/*'))) ? 'current-page':''}}">ডিপার্টমেন্ট</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.rb').'/deleted-designation-list'}}" class="{{($url==config('app.rb').'/deleted-designation-list'  || $url==(request()->is(config('app.rb').'/deleted-designation-restore/*')) || $url==(request()->is(config('app.rb').'/deleted-designation-delete/*'))) ? 'current-page':''}}">পদবী</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.rb').'/deleted-salaryscale-list'}}" class="{{($url==config('app.rb').'/deleted-salaryscale-list'  || $url==(request()->is(config('app.rb').'/deleted-salaryscale-restore/*')) || $url==(request()->is(config('app.rb').'/deleted-salaryscale-delete/*'))) ? 'current-page':''}}">বেতন স্কেল </a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.rb').'/deleted-district-list'}}" class="{{($url==config('app.rb').'/deleted-district-list'  || $url==(request()->is(config('app.rb').'/deleted-district-restore/*')) || $url==(request()->is(config('app.rb').'/deleted-district-delete/*'))) ? 'current-page':''}}">জেলা</a>
                                        </li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.rb').'/deleted-workstation-list'}}" class="{{($url==config('app.rb').'/deleted-workstation-list'  || $url==(request()->is(config('app.rb').'/deleted-workstation-restore/*')) || $url==(request()->is(config('app.rb').'/deleted-workstation-delete/*'))) ? 'current-page':''}}">কর্মস্থল</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar menu ends -->
                        </div>                        
                        
                        <!-- Settings tab -->
                        <div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">
                            
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                সেটিংস
                            </div>
                            <!-- Tab content header end -->

                            <!-- Settings start -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-settings">
                                    <div class="accordion" id="settingsAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="siteSettingInfo">
                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#siteSettingCollapse" aria-expanded="true" aria-controls="siteSettingCollapse">
                                                   সাইট সেটিংস
                                                </button>
                                            </h2>
                                           <!-- <div id="siteSettingCollapse" class="accordion-collapse collapse show" aria-labelledby="siteSettingInfo" data-bs-parent="#settingsAccordion">
                                                <div class="accordion-body">
                                                    {!! Form::open(array('route' =>['save-site-setting',1],'method'=>'PUT')) !!}
                                                    <?php 
                                                        $siteSetting = DB::table('site_setting')->where('id', 1)->first();
                                                    ?>
                                                    <div class="field-wrapper">
                                                        <input type="text" value="{{$siteSetting->site_page_title}}" name="site_page_title"/>
                                                        <div class="field-placeholder">সাইট পেইজ টাইটেল</div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <input type="text" value="{{$siteSetting->hotel_name}}" name="hotel_name"/>
                                                        <div class="field-placeholder">সিস্টেমের নাম</div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <input type="email" value="{{$siteSetting->hotel_email}}" name="hotel_email" />
                                                        <div class="field-placeholder">সিস্টমের ইমেল </div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <input type="text" value="{{$siteSetting->hotel_phone}}" name="hotel_phone" />
                                                        <div class="field-placeholder">সিস্টেমের ফোন</div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <input type="text" value="{{$siteSetting->hotel_website}}" name="hotel_website" />
                                                        <div class="field-placeholder">সিস্টমের ওয়েবসাইট</div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <textarea name="hotel_address">{{$siteSetting->hotel_address}}</textarea>
                                                        <div class="field-placeholder">সিস্টেমের ঠিকানা </div>
                                                    </div>
                                                    <div class="field-wrapper m-0">
                                                        <button class="btn btn-primary stripes-btn" type="submit">সংরক্ষন করুন</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>-->
                                        <!--<div class="accordion-item">
                                            <h2 class="accordion-header" id="currencyInfo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#currencyCollapse" aria-expanded="false" aria-controls="currencyCollapse">
                                                    কারেন্সি
                                                </button>
                                            </h2>
                                            <div id="currencyCollapse" class="accordion-collapse collapse" aria-labelledby="currencyInfo" data-bs-parent="#settingsAccordion">
                                                <div class="accordion-body">
                                                    {!! Form::open(array('route' =>['save-currency-setting',1],'method'=>'PUT')) !!}
                                                    <?php 
                                                        $currencyInfo = DB::table('currency')->where('id', 1)->first();
                                                    ?>
                                                    <div class="field-wrapper">
                                                        <input type="text" value="{{$currencyInfo->currency}}" name="currency">
                                                        <div class="field-placeholder">কারেন্সি</div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <input type="text" value="{{$currencyInfo->symbol}}" name="symbol">
                                                        <div class="field-placeholder">কারেন্সি প্রতিক</div>
                                                    </div>
                                                    <div class="field-wrapper m-0">
                                                        <button class="btn btn-primary stripes-btn">সংরক্ষন করুন</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>-->
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="chngPwd">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chngPwdCollapse" aria-expanded="false" aria-controls="chngPwdCollapse">
                                                    পাসওয়ার্ড পরিবর্তন 
                                                </button>
                                            </h2>
                                            <div id="chngPwdCollapse" class="accordion-collapse collapse" aria-labelledby="chngPwd" data-bs-parent="#settingsAccordion">
                                                <div class="accordion-body">
                                                    {!! Form::open(array('route' =>['update-user-password',Auth::user()->id],'method'=>'PUT')) !!}
                                                    <div class="field-wrapper">
                                                        <input type="password" value="" name="password" id="newPass" class="keyup">
                                                        <div class="field-placeholder">নতুন পাসওয়ার্ড</div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <input type="password" value="" name="password_confirmation" id="confirmPass" class="keyup">
                                                        <div class="field-placeholder">কনফার্ম পাসওয়ার্ড</div>
                                                        <span id="confirmMsg"></span>
                                                    </div>
                                                    <div class="field-wrapper m-0">
                                                        <button class="btn btn-primary stripes-btn">সংরক্ষন করুন</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="chngTheme">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chngThemeCollapse" aria-expanded="false" aria-controls="chngThemeCollapse">
                                                  থিম সেটিংস
                                                </button>
                                            </h2>
                                            <div id="chngThemeCollapse" class="accordion-collapse collapse" aria-labelledby="chngTheme" data-bs-parent="#settingsAccordion">
                                                <div class="accordion-body">
                                                    {!! Form::open(array('route' =>['update-site-theme',Auth::user()->id],'method'=>'PUT')) !!}
                                                    <div class="field-wrapper">
                                                        <select class="form-control" name="theme_id">
                                                            <?php 
                                                                $themeColor = ['1'=>'Blue', '2'=>'Dark', '3'=>'Green', '4'=>'Red', '5'=>'Violet'];
                                                            ?>
                                                            @foreach($themeColor as $key=>$value)
                                                            <option value="{{$key}}" {{($checkThemeforUser->theme_id==$key)?'selected':''}}>{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="field-placeholder">সেলেক্টেড থিম</div>
                                                    </div>
                                                    <div class="field-wrapper m-0">
                                                        <button class="btn btn-primary stripes-btn">সংরক্ষন করুন</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Settings end -->

                            <!-- Sidebar actions starts -->
                           <!-- <div class="sidebar-actions">
                                <div class="support-tile blue">
                                    <a href="account-settings.html" class="btn btn-light m-auto">Advance Settings</a>
                                </div>
                            </div> -->
                            <!-- Sidebar actions ends -->
                        </div>

                    </div>
                    <!-- Tabs content end -->
                    @endif

                    @if(Auth::user()->user_type == 4 || Auth::user()->user_type == 5)
                    <!-- Tabs nav start -->
                    <div class="nav" role="tablist" aria-orientation="vertical">
                        <a href="{{URL::To('home')}}" class="logo">
                            <img src="{{asset('custom/img/logo.svg')}}" alt="Uni Pro Admin">
                        </a>
                        <a class="nav-link {{($url=='home' || $url==config('app.account').'/daily-transaction' || $url==config('app.account').'/final-report' || $url==config('app.or').'/receive-voucher-report' || $url==config('app.op').'/payment-voucher-report' || $url==config('app.hc').'/room-list-report' || $url==config('app.em').'/employee-salary') ? 'active':''}}" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">
                            <i class="icon-home2"></i>
                            <span class="nav-link-text">Dashboard </span>
                        </a>
                        <a class="nav-link settings" id="settings-tab" data-bs-toggle="tab" href="#tab-settings" role="tab" aria-controls="tab-settings" aria-selected="false">
                            <i class="icon-settings1"></i>
                            <span class="nav-link-text">Settings</span>
                        </a>
                    </div>
                    <!-- Tabs nav end -->

                    <!-- Tabs content start -->
                    <div class="tab-content">
                        <!-- Dasboard tab -->
                        <div class="tab-pane fade {{($url=='home' || $url==config('app.account').'/daily-transaction' || $url==config('app.account').'/final-report' || $url==config('app.or').'/receive-voucher-report' || $url==config('app.op').'/payment-voucher-report' || $url==config('app.em').'/employee-salary' || $url==config('app.hc').'/room-list-report') ? 'show active':''}}" id="tab-home" role="tabpanel" aria-labelledby="home-tab">
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                Dashboard 
                            </div>
                            <!-- Tab content header end -->
                            <!-- Sidebar menu starts -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-menu">
                                    <ul>
                                        <li>
                                            <a href="{{URL::To('home')}}" class="{{($url=='home') ? 'current-page':''}}">Dashboard</a>
                                        </li>
                                        <li class="list-heading">Reports</li>
                                        <li>
                                            <a href="{{$baseUrl.'/'.config('app.account').'/daily-transaction'}}"  class="{{($url==config('app.account').'/daily-transaction') ? 'current-page':''}}">Daily Transaction</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Sidebar menu ends -->
                        </div>                      
                        
                        <!-- Settings tab -->
                        <div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">
                            
                            <!-- Tab content header start -->
                            <div class="tab-pane-header">
                                Settings
                            </div>
                            <!-- Tab content header end -->

                            <!-- Settings start -->
                            <div class="sidebarMenuScroll">
                                <div class="sidebar-settings">
                                    <div class="accordion" id="settingsAccordion">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="chngPwd">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chngPwdCollapse" aria-expanded="false" aria-controls="chngPwdCollapse">
                                                    Change Password
                                                </button>
                                            </h2>
                                            <div id="chngPwdCollapse" class="accordion-collapse collapse" aria-labelledby="chngPwd" data-bs-parent="#settingsAccordion">
                                                <div class="accordion-body">
                                                    {!! Form::open(array('route' =>['update-user-password',Auth::user()->id],'method'=>'PUT')) !!}
                                                    <div class="field-wrapper">
                                                        <input type="password" value="" name="password" id="newPass" class="keyup">
                                                        <div class="field-placeholder">New Password</div>
                                                    </div>
                                                    <div class="field-wrapper">
                                                        <input type="password" value="" name="password_confirmation" id="confirmPass" class="keyup">
                                                        <div class="field-placeholder">Confirm Password</div>
                                                        <span id="confirmMsg"></span>
                                                    </div>
                                                    <div class="field-wrapper m-0">
                                                        <button class="btn btn-primary stripes-btn">Save</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="chngTheme">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chngThemeCollapse" aria-expanded="false" aria-controls="chngThemeCollapse">
                                                    Theme Setting
                                                </button>
                                            </h2>
                                            <div id="chngThemeCollapse" class="accordion-collapse collapse" aria-labelledby="chngTheme" data-bs-parent="#settingsAccordion">
                                                <div class="accordion-body">
                                                    {!! Form::open(array('route' =>['update-site-theme',Auth::user()->id],'method'=>'PUT')) !!}
                                                    <div class="field-wrapper">
                                                        <select class="form-control" name="theme_id">
                                                            <?php 
                                                                $themeColor = ['1'=>'Blue', '2'=>'Dark', '3'=>'Green', '4'=>'Red', '5'=>'Violet'];
                                                            ?>
                                                            @foreach($themeColor as $key=>$value)
                                                            <option value="{{$key}}" {{($checkThemeforUser->theme_id==$key)?'selected':''}}>{{$value}}</option>
                                                            @endforeach
                                                        </select>
                                                        <div class="field-placeholder">Selected Theme</div>
                                                    </div>
                                                    <div class="field-wrapper m-0">
                                                        <button class="btn btn-primary stripes-btn">Save</button>
                                                    </div>
                                                    {!! Form::close() !!}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Settings end -->

                            <!-- Sidebar actions starts -->
                            <div class="sidebar-actions">
                                <div class="support-tile blue">
                                    <a href="account-settings.html" class="btn btn-light m-auto">Advance Settings</a>
                                </div>
                            </div>
                            <!-- Sidebar actions ends -->
                        </div>

                    </div>
                    <!-- Tabs content end -->
                    @endif
                </div>
                <!-- Sidebar content end -->
                
            </nav>
            <!-- Sidebar wrapper end -->

            <!-- ************* ************ Main container start ************************** -->
            <div class="main-container"> 
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
                               <!-- <li class="dropdown">
                                    <a href="#" id="taskss" data-toggle="dropdown" aria-haspopup="true">
                                        <i class="icon-check-square"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end lrg" aria-labelledby="taskss">
                                        <div class="dropdown-menu-header">
                                            Tasks (7/10)
                                        </div>
                                        <div class="customScroll">
                                            <ul class="activity">
                                                <li class="activity-list">
                                                    <div class="detail-info">
                                                        <p class="date">Today</p>
                                                        <p class="info">Messages accepted with attachments</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>-->
                                <!--<li class="dropdown">
                                    <a href="#" id="notifications" data-toggle="dropdown" aria-haspopup="true">
                                        <i class="icon-alert-triangle"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end lrg" aria-labelledby="notifications">
                                        <div class="dropdown-menu-header">
                                            Notifications (7)
                                        </div>
                                        <div class="customScroll">
                                            <ul class="header-notifications">
                                                <li>
                                                    <a href="#">
                                                        <div class="user-img online">
                                                            <img src="{{asset('custom/img/user6.png')}}" alt="User">
                                                        </div>
                                                        <div class="details">
                                                            <div class="user-title">Larkyn</div>
                                                            <div class="noti-details">Check out every table in detail.</div>
                                                            <div class="noti-date">April 25, 04:00 pm</div>
                                                        </div>
                                                    </a>
                                                </li>      
                                            </ul>
                                        </div>
                                    </div>
                                </li>-->
                                <li class="dropdown">
                                    <a href="javascript:void(0)" id="userSettings" class="user-settings" data-toggle="dropdown" aria-haspopup="true">
                                        <span class="avatar">
                                            <img src="{{asset('logo/logo.png')}}" alt="User Avatar">
                                            <span class="status busy"></span>
                                        </span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end md" aria-labelledby="userSettings" style="width: 21rem">
                                        <div class="header-profile-actions">
                                            <!--<a href="user-profile.html"><i class="icon-user1"></i>Profile</a>-->
                                            @if(Auth::user()->user_type == 1)
                                            <!--<a href="{{URL::To('select-branch')}}"><i class="icon-user1"></i>Select Branch</a>-->
                                            @endif
                                            <!--<a href="account-settings.html"><i class="icon-settings1"></i>Settings</a>-->
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
                @yield('content') 
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
           <!-- bangla number format -->
        {!!Html::script('custom/banglaNumberFormat/bangla.number.js')!!}
           <!-- summernote -->
        {!!Html::script('custom/vendor/summernote/summernote-bs4.js')!!}
        
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

        <!-- Apex Charts -->
        <!-- {!!Html::script('custom/vendor/apex/apexcharts.min.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/salesGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/ordersGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/earningsGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/visitorsGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/customersGraph.js')!!}
        {!!Html::script('custom/vendor/apex/custom/home/sparkline.js')!!} -->

        <!-- Circleful Charts -->
        <!-- {!!Html::script('custom/vendor/circliful/circliful.min.js')!!}
        {!!Html::script('custom/vendor/circliful/circliful.custom.js')!!} -->

        <!-- Main Js Required -->
        {!!Html::script('custom/js/main.js')!!}

        <!-- Date Range JS -->
        {!!Html::script('custom/vendor/daterange/daterange.js')!!}
        {!!Html::script('custom/vendor/daterange/custom-daterange.js')!!}
        
        <!-- Bootstrap Select JS -->
        {!!Html::script('custom/vendor/bs-select/bs-select.min.js')!!}
        {!!Html::script('custom/vendor/bs-select/bs-select-custom.js')!!}

        <!-- select2 -->
        {!!Html::script('custom/select2/js/select2.min.js')!!}

          
        <script type="text/javascript">
            $(document).ready(function(){
              $('.select2').select2({ width: '100%', height: '100%', placeholder: "Select", allowClear: true });
            });
        </script>

        <!-- Sweet alert -->
        {!!Html::script('custom/sweetalert/sweetalert.min.js')!!}
        <script type="text/javascript">
            $('.confirmdelete').on('click', function (event) {
              event.preventDefault();
                  var $form = $(this).closest('form');
                  swal({
                      title: "Are you sure?",
                      text: $(this).attr('confirm'),
                      type: "warning",
                      icon: "warning",
                      buttons: true,
                      dangerMode: true,
                  })
                  .then((willDelete) => {
                    if (willDelete) {
                      $form.submit();
                    }
                  });
            });

            $(document).ready( function () {
              $('#dataTable').DataTable({
                "paging":   true,
                "ordering": true,
                "info":     true,
              });
            });

            function printReport() {
                //("#print_icon").hide();
                var reportTablePrint=document.getElementById("printTable");
                newWin= window.open();
                var is_chrome = Boolean(newWin.chrome);
                //newWin.document.write('<table width="100%"><tr><td><center>শুকরিয়া মার্কেট<br>জিন্দা বাজার, সিলেট<br>(+৮৮০) ১৭১১৭২১০৮০</center></td></tr></table><br>');
                var top = '<center><img src="{{URL::to("logo/logo.png")}}" width="40px" height="40px"></center>';
                  top += '<center><h3>ইসলামিক ফাউন্ডেশন</h3></center>';
                  top += '<center><p style="margin-top:-10px">প্রতিষ্ঠাতা - জাতির পিতা বঙ্গবন্ধু শেখ মজিবুর রহমান </p></center>';
                  top += '<center><p style="margin-top:-10px">হেড অফিস</p></center>';
                newWin.document.write(top);
                newWin.document.write(reportTablePrint.innerHTML);
                if (is_chrome) {
                    setTimeout(function () { // wait until all resources loaded 
                    newWin.document.close(); // necessary for IE >= 10
                    newWin.focus(); // necessary for IE >= 10
                    newWin.print();  // change window to winPrint
                    newWin.close();// change window to winPrint
                    }, 250);
                }
                else {
                    newWin.document.close(); // necessary for IE >= 10
                    newWin.focus(); // necessary for IE >= 10

                    newWin.print();
                    newWin.close();
                }
            }

            $('.keyup').on('keyup', function () {
              if ($('#newPass').val() == $('#confirmPass').val()) {
                $('#confirmMsg').html('Password Matched !').css('color', 'green');
              } else 
                $('#confirmMsg').html('Password Do not Matched !').css('color', 'red');
            });
        </script>

        <!--jquery datepicker-->
        <!-- <link href= "https://code.jquery.com/ui/1.10.4/themes/ui-lightness/jquery-ui.css" rel="stylesheet">
        <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
        <script>
            $(function() {
              $( ".datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });

              $(".monthpicker").datepicker({
                  changeMonth: true,
                  changeYear: true,
                  dateFormat: "MM-yy",
                  showButtonPanel: true,
                  currentText: "This Month",
                  onChangeMonthYear: function (year, month, inst) {
                      $(this).val($.datepicker.formatDate('MM-yy', new Date(year, month - 1, 1)));
                  },
                  onClose: function(dateText, inst) {
                      var month = $(".ui-datepicker-month :selected").val();
                      var year = $(".ui-datepicker-year :selected").val();
                      $(this).val($.datepicker.formatDate('MM-yy', new Date(year, month, 1)));
                  }
              }).focus(function () {
                  $(".ui-datepicker-calendar").hide();
              }).after(
                  $("<a href='javascript: void(0);'>clear</a>").click(function() {
                      $(this).prev().val('');
                  })
              );
            });
        </script> -->
        <!--./jquery datepicker-->
    </body>
</html>