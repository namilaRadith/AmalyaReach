<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AMALYA REACH | Admin Panel</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('css_ref')
            <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{ asset('/admin/bootstrap/css/bootstrap.min.css')}}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    <link rel="stylesheet" hreft="{{ asset('/admin/dist/css/AdminLTE.min.css')}}">

    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/datatables/dataTables.bootstrap.css') }}">

    <!-- Custom style -->
    <link rel="stylesheet" href="{{ asset('/admin/dist/css/custom.css')}}">

    <!-- Sweet Alert -->
    <link rel="stylesheet" href="{{ asset('/admin/plugins/sweetAlert/sweetalert.css')}}">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    @show
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<style>
    label.error {
        color: red;
    }

    input.error {
        border: 1px solid red;
    }

</style>

<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">


    <header class="main-header">
        <!-- Logo -->
        <a href="{{action('AdminDashboardController@index')}}" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Amalya</b>REACH</span>
        </a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
            <!-- Sidebar toggle button-->
            <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>

            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- Messages: style can be found in dropdown.less-->
                    <li class="dropdown messages-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-envelope-o"></i>
                            <span class="label label-success">4</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 4 messages</li>
                            <li>
                                <!-- inner menu: contains the actual data -->
                                <ul class="menu">
                                    <li><!-- start message -->
                                        <a href="#">
                                            <div class="pull-left">
                                                <!-- User Image -->
                                                <img src="{{asset('/admin/dist/img/user2-160x160.jpg')}}"
                                                     class="img-circle" alt="User Image">
                                            </div>
                                            <h4>
                                                Support Team
                                                <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                            </h4>
                                            <p>Why not buy a new awesome theme?</p>
                                        </a>
                                    </li>
                                    <!-- end message -->
                                </ul>
                            </li>
                            <li class="footer"><a href="#">See All Messages</a></li>
                        </ul>
                    </li>

                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-flag-o"></i>
                            <span class="label label-danger">9</span>
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">You have 9 tasks</li>
                            <li><!-- Task item -->
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-bell-o"></i>
                                    <span class="label label-danger">{{ \App\Reservation::newReservationsCount() +  \App\Reservation::notCallCount() }}</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header" style="text-align: center"><B>Reservations</B></li>
                                    <li>
                                        <!-- Inner Menu: contains the notifications -->
                                        <ul class="menu">
                                            <li style="text-align: center"><!-- start notification -->
                                                <a href="#">
                                                    You have {{ \App\Reservation::newReservationsCount() }} New
                                                    Reservations
                                                </a>
                                                <a href="#">
                                                    <!-- Task title and progress text -->
                                                    <h3>
                                                        Design some buttons
                                                        <small class="pull-right">20%</small>
                                                    </h3>
                                                    <!-- The progress bar -->
                                                    <div class="progress xs">
                                                        <!-- Change the css width attribute to simulate progress -->
                                                        <div class="progress-bar progress-bar-aqua"
                                                             style="width: 20%"
                                                             role="progressbar" aria-valuenow="20"
                                                             aria-valuemin="0"
                                                             aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                        </div>
                                                    </div>
                                                    You have to take
                                                    another {{ \App\Reservation::notCallCount() }} Calls
                                                </a>
                                            </li>
                                            <!-- end notification -->
                                        </ul>
                                    </li>
                                    <li class="footer"><a href="view_all_reservations">View all</a></li>
                                </ul>
                        </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <li class="dropdown user user-menu">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="{{asset('/admin/dist/img/user2-160x160.jpg')}}" class="user-image"
                                 alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs">Alexander Pierce</span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="{{asset('/admin/dist/img/user2-160x160.jpg')}}"
                                     class="img-circle"
                                     alt="User Image">

                                <p>
                                    Alexander Pierce - Web Developer
                                    <small>Member since Nov. 2012</small>
                                </p>
                            </li>
                            <!-- Menu Body -->
                            <li class="user-body">
                                <div class="row">
                                    <div class=" text-center">
                                        <a href="{{action('HomeController@index')}}">Back to Client
                                            mode</a>
                                    </div>

                                </div>
                                <!-- /.row -->
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-left">
                                    <a href="#" class="btn btn-default btn-flat">Profile</a>
                                </div>
                                <div class="pull-right">
                                    <a href="auth/logout" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                    <!-- Control Sidebar Toggle Button -->
                    <li>
                        <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">

            <!-- Sidebar user panel (optional) -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="{{asset('/admin/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                </div>
                <div class="pull-left info">
                    <p>Alexander Pierce</p>
                    <!-- Status -->
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>

            <!-- search form (Optional) -->
            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
                </div>
            </form>
            <!-- /.search form -->

            <!-- Sidebar Menu -->
            <ul class="sidebar-menu">
                <li class="header">Amalya Reach Admin Panel</li>
                <!-- Tree View Dashboard -->
                <li class=" {{Request::segment(1) === 'dashboard' ? 'active' : '' }} treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Dashboard</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">Home Page</a>
                            <ul class="treeview-menu">
                                <li class="#"><a href="{{action('AdminDashboardController@showImageSlider')}}"><i
                                                class="fa fa-circle-o"></i>Slider Images</a></li>

                            </ul>
                        </li>
                        <li><a href="{{action('AdminDashboardController@showAboutUs')}}">About-Us Page</a></li>
                        <li><a href="{{action('AdminDashboardController@showDinningList')}}">Dinning Page</a></li>
                        <li><a href="#">Facilities Page</a></li>
                        <li><a href="#">Functions Page</a></li>
                        <li><a href="{{action('AdminDashboardController@showContactUs')}}">Contact-Us Page</a></li>
                        <li class="{{Request::segment(2) === 'gallery' ? 'active' : '' }}"><a href="#">Gallery Page<i
                                        class="fa fa-angle-left pull-right"></i></a>
                            <ul class="treeview-menu">
                                <li class="{{Request::segment(3) ==='img-gallery' ? 'active' : '' }}"><a
                                            href="{{action('AdminDashboardController@showImageGallery')}}"><i
                                                class="fa fa-circle-o"></i> Photo Gallery </a></li>
                                <li class="{{Request::segment(3) ==='vd-gallery' ? 'active' : '' }}"><a
                                            href="{{action('AdminDashboardController@showVideoGallery')}}"><i
                                                class="fa fa-circle-o"></i> Video Gallery</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>


                <!-- Promotions area  -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Promotions</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="">Add Promotion</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Loyalty</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                    </ul>
                </li>

                <!-- Rooms -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Rooms</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="adminRoomsHome">Rooms Home</a></li>
                        <li><a href="adminAddNewRooms">Add New Room</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Reservations</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <a href="#"><i class="fa fa-link"></i> <span>Accommodations</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="view_all_reservations">View All</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Dinning</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <a href="#"><i class="fa fa-link"></i> <span>Event Reports</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{action('dinningController@diningMenu')}}">Dinning Menu</a></li>
                        <li><a href="{{action('dinningController@diningAddMenuForm')}}">Add Dinning Menu</a></li>
                        <li><a href="{{action('dinningController@viewDinningReservations')}}">Dinning Reservations</a>
                        </li>
                        <li><a href="admin_event_reports_room">Room Reservations</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Meetings</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <a href="#"><i class="fa fa-link"></i> <span>Markups</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="admin_add_markups">Add Markups</a></li>
                    </ul>
                </li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Accommodations</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <a href="#"><i class="fa fa-link"></i> <span>Accommodations</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">Add New Accommodation</a></li>
                        <li><a href="#">Add New Accommodation</a></li>
                    </ul>
                </li>


                <!--Pool Area -->
                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Swimming pool</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{action('poolController@adminPoolRes')}}">Swimming Pool Reservations</a></li>
                    </ul>
                </li>

                <li class="{{Request::segment(1) === 'newsletter' ? 'active' : '' }} treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>News Letter</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li class="{{Request::segment(2) === 'create' ? 'active' : '' }}">
                            <a href="{{action('AdminDashboardController@showCreateNewsLetter')}}">Create News
                                Letter </a>
                        </li>
                        <li><a href="#">View News Letters</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Users</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="{{action('AdminDashboardController@listAllUsers')}}">View all users</a></li>
                        <li><a href="{{action('AdminDashboardController@showAddPowerUser')}}">Add Power users</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Subscribers</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">List All Subscribers</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-link"></i> <span>Customers</span> <i
                                class="fa fa-angle-left pull-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="#">List All customers</a></li>
                        <li>
                            <a href="#">Customer reviews</a>
                            <ul class="treeview-menu">
                                <li><a href="#">Questioner Results</a></li>
                                <li><a href="{{action('AdminDashboardController@showManageQuestioners')}}">Manage
                                        Questioner</a></li>

                            </ul>
                        </li>

                        <li>
                            <a href="#">Customer feedbacks</a>
                            <ul class="treeview-menu">
                                <li><a href="#">List all customer feedbacks</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>

            </ul>
            <!-- /.sidebar-menu -->
        </section>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">

            @yield('content_header')

        </section>

        <!-- Main content -->
        <section class="content">

            @yield('content')

        </section>


        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->


    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- To the right -->
        <div class="pull-right hidden-xs">
            Anything you want
        </div>
        <!-- Default to the left -->
        <strong>Copyright &copy; 2015 <a href="#">Company</a>.</strong> All rights reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
            <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
            <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
            <!-- Home tab content -->
            <div class="tab-pane active" id="control-sidebar-home-tab">
                <h3 class="control-sidebar-heading">Recent Activity</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <i class="menu-icon fa fa-birthday-cake bg-red"></i>

                            <div class="menu-info">
                                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                                <p>Will be 23 on April 24th</p>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

                <h3 class="control-sidebar-heading">Tasks Progress</h3>
                <ul class="control-sidebar-menu">
                    <li>
                        <a href="javascript::;">
                            <h4 class="control-sidebar-subheading">
                                Custom Template Design
                                <span class="label label-danger pull-right">70%</span>
                            </h4>

                            <div class="progress progress-xxs">
                                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                            </div>
                        </a>
                    </li>
                </ul>
                <!-- /.control-sidebar-menu -->

            </div>
            <!-- /.tab-pane -->
            <!-- Stats tab content -->
            <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
            <!-- /.tab-pane -->
            <!-- Settings tab content -->
            <div class="tab-pane" id="control-sidebar-settings-tab">
                <form method="post">
                    <h3 class="control-sidebar-heading">General Settings</h3>

                    <div class="form-group">
                        <label class="control-sidebar-subheading">
                            Report panel usage
                            <input type="checkbox" class="pull-right" checked>
                        </label>

                        <p>
                            Some information about this general settings option
                        </p>
                    </div>
                    <!-- /.form-group -->
                </form>
            </div>
            <!-- /.tab-pane -->
        </div>
    </aside>
    <!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
    <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->


<div class="example-modal">
    <div class="modal " id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modelTitle"></h4>
                </div>
                <div class="modal-body">
                    <p id="modalMessage"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->
</div>
<!-- /.example-modal -->


@section('js_ref')

        <!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 2.1.4 -->
<script src="{{asset('/admin/plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{asset('/admin/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('/admin/dist/js/app.min.js')}}"></script>
<!-- Sweet Alert -->
<script src="{{asset('/admin/plugins/sweetAlert/sweetalert.min.js')}}"></script>
<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<script type="text/javascript">
    $.ajaxSetup({
        headers: {
            'X-CSRF-Token': $('meta[name="csrf_token"]').attr('content')
        }
    });
    //
    //    $('#myModal').on('shown.bs.modal', function () {
    //        $('#myInput').focus()
    //    })
    //
    //    function modalCall(messageType,Title,Message){
    //
    //        $('#myModal').removeClass();
    //        $('#myModal').addClass("modal");
    //        $('#myModal').addClass("modal-"+messageType);
    //        $('#modelTitle').html(Title);
    //        $('#modalMessage').html(Message);
    //
    //        $('#myModal').modal('show');
    //
    //        setTimeout(function(){
    //            $('#myModal').modal('hide');
    //        },2000);
    //
    //    }
</script>


<script>
    $(function () {
        $("#adminRoomsHomeTable").DataTable();
    });
    $(function () {
        $("#events_reports_rooms").DataTable();
    });

</script>


<!-- DataTables -->
<script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('admin/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>

<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

{{--<script src="//code.jquery.com/jquery-1.10.2.js"></script>--}}

<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

<script>
    $(function () {
        $(".dateadmin").datepicker();
    });

    @if (Notify::has('success'))
    swal("success!", "{{ Notify::first('success') }}", "success");

    @endif

    @if (Notify::has('error'))
        swal("error!", "{{ Notify::first('error') }}", "error");
    @endif

    @if (Notify::has('warning'))
        swal("warning!", "{{ Notify::first('warning') }}", "warning");
    @endif

    @if (Notify::has('info'))
        swal("info!", "{{ Notify::first('info') }}", "info");
    @endif

</script>

<script>
    $(function () {
        $("#adminDinResTable").DataTable();
    });
</script>

<script>
    $("#dropDownNotify").on('click', function () {
        $("#lblNotify").hide();

    });

</script>


<script>
    $(function () {
        $("#admineetinResTbl").DataTable();
    });
</script>

<script>


    //    function showNotifications()
    //    {
    //        $.ajax({
    //            url  : '/adminNotify',
    //            type : 'get',
    //
    //            success : function(data){
    //                document.getElementById("notifications").innerHTML = data;
    ////               alert("blah");
    //            },
    //            error :function(err,req){
    //                alert(JSON.stringify(data));
    //            },
    //        });
    //
    //      setTimeout("showNotifications()",300)
    //    }
    //
    //    onLoad=showNotifications();

</script>


@show
        <!-- Optionally, you can add Slimscroll and FastClick plugins.
Both of these plugins are recommended to enhance the
user experience. Slimscroll is required when using the
fixed layout. -->


</body>
</html>
