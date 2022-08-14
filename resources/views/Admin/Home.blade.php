<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Free Bootstrap Admin Template : Two Page</title>


    <!-- BOOTSTRAP STYLES-->
    <link href="{{url('css/app.css')}}" rel="stylesheet"/>
    <link href="{{url('assets/css/bootstrap.css')}}" rel="stylesheet"/>
    <!-- FONTAWESOME STYLES-->
    <link href="{{url('assets/css/font-awesome.css')}}" rel="stylesheet"/>
    <!-- CUSTOM STYLES-->
    <link href="{{url('assets/css/custom.css')}}" rel="stylesheet"/>
    <!-- GOOGLE FONTS-->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'/>
    
    <style>
        body{
            direction: ltr!important;
        }
    </style>
<script src="{{mix('/js/app.js')}}" defer></script>
</head>
<body>
<div id="wrapper">
    <nav class="navbar-default navbar-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="main-menu">
                <li class="text-center user-image-back">
                    <img src="{{url('assets/img/find_user.png')}}" class="img-responsive"/>

                </li>
                <li class="justify-content-between align-content-center">
                    <a class="d-block my-font-IYM my-f-13"  href="index.html"><i class="fa fa-desktop "></i>صفحه اصلی</a>
                </li>
                <li class=" my-font-IYM">
                    <a class=" my-font-IYM my-f-13"><i class="fa fa-edit "></i>محصولات<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="my-f-11">
                            <a href="{{route('admin.show.item' , ['model' => '\App\Models\Product'])}}">محصولات اصلی</a>
                        </li>
                        <li>
                            <a href="#">Elements</a>
                        </li>
                        <li>
                            <a href="#">Free Link</a>
                        </li>
                    </ul>
                </li>
                <li class=" my-font-IYM">
                    <a class=" my-font-IYM my-f-13"><i class="fa fa-edit "></i>صفحه اصلی<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li class="my-f-11">
                            <a href="{{route('admin.show.item' , ['model' => '\App\Models\Menu'])}}">منو اصلی</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-edit "></i>Forms </a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap "></i>Multi-Level Dropdown<span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link</a>
                        </li>
                        <li>
                            <a href="#">Second Level Link<span class="fa arrow"></span></a>
                            <ul class="nav nav-third-level">
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                                <li>
                                    <a href="#">Third Level Link</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-qrcode "></i>Tabs & Panels</a>
                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i>Mettis Charts</a>
                </li>

                <li>
                    <a href="#"><i class="fa fa-edit "></i>Last Link </a>
                </li>
                <li>
                    <a href="blank.html"><i class="fa fa-table "></i>Blank Page</a>
                </li>
            </ul>
        </div>
    </nav>
    <div id="page-wrapper">
        <div id="page-inner">
            <div class="row" id="app">
                <div class="col-md-12">
                    @{{ ttt }}
                    @yield('page')
                </div>
            </div>
            <hr/>
        </div>
    </div>
</div>
<script src="{{url('assets/js/jquery-1.10.2.js')}}"></script>
<script src="{{url('assets/js/bootstrap.min.js')}}"></script>
<script src="{{url('assets/js/jquery.metisMenu.js')}}"></script>
<script src="{{url('assets/js/custom.js')}}"></script>


</body>
</html>
