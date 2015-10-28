<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title> Inventory </title>

    <!-- Bootstrap core CSS -->

    <link href="{{ asset('template/production/css/bootstrap.min.css') }}" rel="stylesheet">

    <link href="{{ asset('template/production/fonts/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('template/production/css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom styling plus plugins -->
    <link href="{{ asset('template/production/css/custom.css') }}" rel="stylesheet">
    <link href="{{ asset('template/production/css/icheck/flat/green.css') }}" rel="stylesheet">
    <link href="{{ asset('template/production/js/datatables/css/jquery.dataTables.css') }}" rel="stylesheet">

    <script src="{{ asset('template/production/js/jquery.min.js') }}"></script>

    <!--[if lt IE 9]>
        <script src="../assets/js/ie8-responsive-file-warning.js"></script>
        <![endif]-->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

    @yield('style')

</head>


<body class="nav-md">

    <div class="container body">

        <div class="main_container">

            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">

                    <div class="navbar nav_title" style="border: 0;">
                        <a href="#" class="site_title"><i class="fa fa-paw"></i> <span>Indigital</span></a>
                    </div>
                    <div class="clearfix"></div>

                    <!-- menu prile quick info -->
                    <div class="profile">
                        <div class="profile_pic">
                            @if(!empty(Auth::user()->profile->avatar))
                              @if(Auth::user()->profile->avatar == null)
                                <img src="{{ asset('images/avatar/profile.png') }}" alt="..." class="img-circle profile_img">
                              @else
                                <img src="{{ asset('images/avatar/'.Auth::user()->profile->avatar) }}" alt="..." class="img-circle profile_img">
                              @endif
                            @else
                              <img src="{{ asset('images/avatar/profile.png') }}" alt="..." class="img-circle profile_img">
                            @endif
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                        </div>
                    </div>
                    <!-- /menu prile quick info -->

                    <br />
                    <div class="clearfix"></div>
                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                        <h3 class="text-center">Menu</h3>
                        <div class="menu_section">
                            <ul class="nav side-menu">
                                <li><a href="{{ url('home') }}"><i class="fa fa-home"></i> Home</a></li>
                                @if(Auth::user()->is('admin'))
                                <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{ url('user/create') }}">Create</a></li>
                                        <li><a href="{{ url('user/admin') }}">Admin</a></li>
                                        <li><a href="{{ url('user/client') }}">Client</a></li>
                                    </ul>
                                </li>
                                @endif
                                @if(Auth::user()->is('client'))
                                <li><a href="{{ url('report') }}"><i class="fa fa-file-text-o"></i> Laporan</a></li>
                                <li><a><i class="fa fa-shopping-cart"></i> Order <span class="fa fa-chevron-down"></span></a>
                                    <ul class="nav child_menu" style="display: none">
                                        <li><a href="{{url('order/create')}}">Create</a></li>
                                        <li><a href="{{url('order')}}">List</a></li>
                                    </ul>
                                </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <!-- /sidebar menu -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">

                <div class="nav_menu">
                    <nav class="" role="navigation">
                        <div class="nav toggle">
                            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                        </div>

                        <ul class="nav navbar-nav navbar-right">
                            <li class="">
                                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                  @if(!empty(Auth::user()->profile))
                                    @if(Auth::user()->profile->avatar == null)
                                      <img src="{{ asset('images/avatar/profile.png') }}" alt="...">
                                    @else
                                      <img src="{{ asset('images/avatar/'.Auth::user()->profile->avatar) }}" alt="...">
                                    @endif
                                  @else
                                    <img src="{{ asset('images/avatar/profile.png') }}" alt="...">
                                  @endif
                                    <span class=" fa fa-angle-down"></span>
                                </a>
                                <ul class="dropdown-menu dropdown-usermenu animated fadeInDown pull-right">
                                    <li><a href="{{url('profile')}}">  Profile</a></li>
                                    <li><a href="{{url('changePassword')}}">  Ganti Password</a></li>
                                    <li><a href="{{url('auth/logout')}}"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                                </ul>
                            </li>

                            <li role="presentation" class="dropdown">
                                <a href="javascript:;" class="dropdown-toggle info-number" data-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-envelope-o"></i>
                                    <span class="badge bg-green">6</span>
                                </a>
                                <ul id="menu1" class="dropdown-menu list-unstyled msg_list animated fadeInDown" role="menu">
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{{ asset('template/production/images/img.jpg') }}" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{{ asset('template/production/images/img.jpg') }}" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{{ asset('template/production/images/img.jpg') }}" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a>
                                            <span class="image">
                                        <img src="{{ asset('template/production/images/img.jpg') }}" alt="Profile Image" />
                                    </span>
                                            <span>
                                        <span>John Smith</span>
                                            <span class="time">3 mins ago</span>
                                            </span>
                                            <span class="message">
                                        Film festivals used to be do-or-die moments for movie makers. They were where...
                                    </span>
                                        </a>
                                    </li>
                                    <li>
                                        <div class="text-center">
                                            <a>
                                                <strong>See All Alerts</strong>
                                                <i class="fa fa-angle-right"></i>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </li>

                        </ul>
                    </nav>
                </div>

            </div>
            <!-- /top navigation -->

            <!-- page content -->
            <div class="right_col" role="main">
                <div class="" style="min-height:600px">
                    <div class="clearfix"></div>
                    <div class="row">

                          @yield('content')

                    </div>
                </div>

                <!-- footer content -->
                <footer>
                    <div class="">
                        <p class="pull-right">
                            <span class="lead">  </span>
                        </p>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->

            </div>
            <!-- /page content -->
        </div>

    </div>

    <script src="{{ asset('template/production/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/production/js/autocomplete/jquery.autocomplete.js') }}"></script>

    <!-- chart js -->
    <script src="{{ asset('template/production/js/chartjs/chart.min.js') }}"></script>
    <!-- bootstrap progress js -->
    <script src="{{ asset('template/production/js/progressbar/bootstrap-progressbar.min.js') }}"></script>
    <script src="{{ asset('template/production/js/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <!-- icheck -->
    <script src="{{ asset('template/production/js/icheck/icheck.min.js') }}"></script>

    <!-- daterangepicker -->
    <script type="text/javascript" src="{{ asset('template/production/js/moment.min2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('template/production/js/datepicker/daterangepicker.js') }}"></script>

    <script src="{{ asset('template/production/js/custom.js') }}"></script>

    <!-- moris js -->
    <!-- <script src="{{ asset('template/production/js/moris/raphael-min.js') }}"></script>
    <script src="{{ asset('template/production/js/moris/morris.js') }}"></script>
    <script src="{{ asset('template/production/js/moris/example.js') }}"></script> -->

    <!-- Datatables -->
    <script src="{{ asset('template/production/js/datatables/js/jquery.dataTables.js') }}"></script>
    <!-- form validation -->
    <script type="text/javascript" src="{{ asset('template/production/js/parsley/new-parsley.min.js') }}"></script>
    @yield('script')

</body>

</html>
