<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Laravel Admin Panel</title>

    <!-- Start of Async Drift Code -->
<script>
"use strict";

!function() {
  var t = window.driftt = window.drift = window.driftt || [];
  if (!t.init) {
    if (t.invoked) return void (window.console && console.error && console.error("Drift snippet included twice."));
    t.invoked = !0, t.methods = [ "identify", "config", "track", "reset", "debug", "show", "ping", "page", "hide", "off", "on" ], 
    t.factory = function(e) {
      return function() {
        var n = Array.prototype.slice.call(arguments);
        return n.unshift(e), t.push(n), t;
      };
    }, t.methods.forEach(function(e) {
      t[e] = t.factory(e);
    }), t.load = function(t) {
      var e = 3e5, n = Math.ceil(new Date() / e) * e, o = document.createElement("script");
      o.type = "text/javascript", o.async = !0, o.crossorigin = "anonymous", o.src = "https://js.driftt.com/include/" + n + "/" + t + ".js";
      var i = document.getElementsByTagName("script")[0];
      i.parentNode.insertBefore(o, i);
    };
  }
}();
drift.SNIPPET_VERSION = '0.3.1';
drift.load('79av234g52za');
</script>
<!-- End of Async Drift Code -->

    <!-- Custom fonts for this template-->
    <link href="{{ asset('sbadmin/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('sbadmin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    

</head>

<body id="page-top">
    

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home')}}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-home"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Laravel Admin</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
          <!-- Divider -->
          <hr class="sidebar-divider my-0">

        <!-- add menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url ('trainings/create') }}">
                <i class="fas fa-fw fa-edit"></i>
                <span>Insert New Training</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url ('trainings') }}">
                <i class="fas fa-fw fa-search"></i>
                <span>Search / Listing</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- add menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ url ('trainers/create') }}">
                <i class="fas fa-fw fa-edit"></i>
                <span>Insert New Trainer</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url ('trainers') }}">
                <i class="fas fa-fw fa-search"></i>
                <span>Search / Listing Trainer</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ url ('assigns/create') }}">
                <i class="fas fa-fw fa-clipboard"></i>
                <span>Assign Trainings</span></a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ url ('assigns/fullcalendar') }}">
                <i class="fas fa-fw fa-calendar"></i>
                <span>Calendar</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <li class="nav-item">
            <a class="nav-link" href="{{ url ('chatify') }}">
                <i class="fas fa-fw fa-comment"></i>
                <span>Chat</span></a>
        </li>

         <!-- Divider -->
         <hr class="sidebar-divider my-0">


            <li class="nav-item">
                <a class="nav-link" href="{{ route('logout') }}"  onclick="event.preventDefault(); 
                document.getElementById('logout-form').submit();">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                <span>Logout</span></a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        <!-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i> -->
                                <!-- Counter - Alerts -->
                                <!-- <span class="badge badge-danger badge-counter">3+</span>
                            </a> -->
                            <!-- Dropdown - Alerts -->
                            <!-- <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> -->
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                @guest
                                @else
                                    {{ Auth::user()->name }}
                                @endif
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="{{ asset('sbadmin/img/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <!-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Trainings</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTrainingCount }}</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('training:index') }}" style="text-decoration: none; color: inherit;">
                                <div class="card border-left-primary shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                    Total Trainings</div>
                                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $totalTrainingCount }}</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>


                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <a href="{{ route('trainer:trainer') }}" style="text-decoration: none; color: inherit;">
                                <div class="card border-left-info shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Trainers
                                                </div>
                                                <div class="row no-gutters align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">{{ $totalTrainerCount }}</div>
                                                    </div>
                                                    <div class="col">
                                                    
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!-- Pending Requests Card Example
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Pending Requests</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <!-- <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4"> -->
                                <!-- Card Header - Dropdown -->
                                <!-- <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div> -->
                                <!-- Card Body -->
                                <!-- <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div> -->

                        <!-- Pie Chart -->
                        <div class="col-xl-5 col-lg-5">
                            <div class="card shadow mb-5" style="height: 433px;">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Trainers</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Active
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Inactive
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart Department-->
                        <div class="col-xl-5 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Trainers in Departments</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChartDept"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Multimedia
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Software Development
                                        </span>
                                       <br>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Networking
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle" style="color:orange"></i> Cybersecurity
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                        <div class="col-lg-6 mb-4">
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Laravel 2023</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST"></form>
                    @csrf

                </div>
            </div>
        </div>
    </div>

    <!-- Active Trainer Modal-->
    <div class="modal fade" id="trainerModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Active Trainers</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- Display list of trainers dynamically -->
                     <div class="card-body">
            
                        <table class = "table table-striped" id="trainersTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- trainings - table db -->
                                <!-- training - simpan data -->
                                @foreach ($trainings as $training)
                                    <tr>
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $loop->index + $trainings->firstItem() }}</td>

                                        <td>{{ $training->name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <div id="loadMoreContainer">
                            <button class="btn btn-primary" id="loadMoreBtn">Load More</button>
                        </div>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Inactive Trainer Modal-->
    <div class="modal fade" id="trainerInactiveModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Inactive Trainers</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- Display list of trainers dynamically -->
                     <div class="card-body">
                
                        <table class = "table table-striped" id="trainersTableInactive">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- trainings - table db -->
                                <!-- training - simpan data -->
                                @foreach ($trainingsInactive as $training)
                                    <tr>
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $loop->index + $trainingsInactive->firstItem() }}</td>

                                        <td>{{ $training->name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <div id="loadMoreContainerInactive">
                            <button class="btn btn-primary" id="loadMoreBtnInactive">Load More</button>
                        </div>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!--  SD Department Modal-->
    <div class="modal fade" id="softwareModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Software Development Trainers</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- Display list of trainers dynamically -->
                     <div class="card-body">
             
                        <table class = "table table-striped" id="softwareTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- trainings - table db -->
                                <!-- training - simpan data -->
                                @foreach ($softwareTrainers as $training)
                                    <tr>
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $loop->index + $softwareTrainers->firstItem() }}</td>

                                        <td>{{ $training->name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <div id="loadMoreContainerSoftware">
                            <button class="btn btn-primary" id="loadMoreBtnSoftware">Load More</button>
                        </div>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!--  Multimedia Department Modal-->
    <div class="modal fade" id="multimediaModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Multimedia Trainers</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- Display list of trainers dynamically -->
                     <div class="card-body">
             
                        <table class = "table table-striped" id="multimediaTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- trainings - table db -->
                                <!-- training - simpan data -->
                                @foreach ($multimediaTrainers as $training)
                                    <tr>
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $loop->index + $multimediaTrainers->firstItem() }}</td>

                                        <td>{{ $training->name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <div id="loadMoreContainerMultimedia">
                            <button class="btn btn-primary" id="loadMoreBtnMultimedia">Load More</button>
                        </div>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!--  Cybersecurity Department Modal-->
    <div class="modal fade" id="cyberModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cybersecurity Trainers</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- Display list of trainers dynamically -->
                     <div class="card-body">
             
                        <table class = "table table-striped" id="cyberTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- trainings - table db -->
                                <!-- training - simpan data -->
                                @foreach ($cyberTrainers as $training)
                                    <tr>
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $loop->index + $cyberTrainers->firstItem() }}</td>

                                        <td>{{ $training->name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <div id="loadMoreContainerCyber">
                            <button class="btn btn-primary" id="loadMoreBtnCyber">Load More</button>
                        </div>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    <!--  Networking Department Modal-->
    <div class="modal fade" id="networkModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Networking Trainers</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                     <!-- Display list of trainers dynamically -->
                     <div class="card-body">
             
                        <table class = "table table-striped" id="networkTable">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Trainer</th>
                                </tr>
                            </thead>

                            <tbody>
                                <!-- trainings - table db -->
                                <!-- training - simpan data -->
                                @foreach ($networkTrainers as $training)
                                    <tr>
                                        <!-- <td>{{ $loop->index + 1 }}</td> -->
                                        <td>{{ $loop->index + $networkTrainers->firstItem() }}</td>

                                        <td>{{ $training->name }}</td>
                                    </tr>
                                @endforeach

                            </tbody>

                        </table>
                        <div id="loadMoreContainerNetwork">
                            <button class="btn btn-primary" id="loadMoreBtnNetwork">Load More</button>
                        </div>
                </div>
                
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    
                </div>

                
            </div>
        </div>
    </div>



    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('sbadmin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('sbadmin/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('sbadmin/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    <script src="{{ asset('sbadmin/js/demo/chart-area-demo.js') }}"></script>
    <!-- <script src="{{ asset('sbadmin/js/demo/chart-pie-demo.js') }}"></script> -->
    <!-- <script src="{{ asset('sbadmin/js/trainer-modal.js') }}"></script> -->


<!-- Pie Chart for Trainers -->
    <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito, -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Trainer
    var ctx = document.getElementById("myPieChart");
    var myPieChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ["Inactive", "Active"],
            datasets: [{
                data: [<?=$totalInactiveTrainer?>, <?= $totalActiveTrainer ?>],
                backgroundColor: ['#4e73df', '#1cc88a'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },

        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
    });

    // Attach a click event listener to the chart canvas
    ctx.addEventListener('click', function(event) {
        // Get the clicked element
        var activeElement = myPieChart.getElementAtEvent(event);

        // Check if an element was clicked and if it's the "Active" part
        if (activeElement.length > 0 && activeElement[0]._model.label === 'Active') {
            // Trigger the modal when the "Active" part of the chart is clicked
            $('#trainerModal').modal('show');
        }
        else{
            $('#trainerInactiveModal').modal('show');
        }
    });
    </script>

    <!-- PieChart for Departments -->
    <script>
    // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito, -apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    var deptCounts = <?php echo json_encode($deptCounts); ?>;
    var ctx = document.getElementById("myPieChartDept");
    var myPieChartDept = new Chart(ctx, {
        type: 'doughnut',
        data: {
            // labels: Object.keys(deptCounts),
            labels: ["Multimedia", "Software Development", "Networking", "Cybersecurity"],
            
            datasets: [{
                
                data: Object.values(deptCounts),
                backgroundColor: ['#4e73df', '#1cc88a', '#ffc107', '#fd7e14'],
                hoverBackgroundColor: ['#2e59d9', '#17a673'],
                hoverBorderColor: "rgba(234, 236, 244, 1)",
            }],
        },

        options: {
            maintainAspectRatio: false,
            tooltips: {
            backgroundColor: "rgb(255,255,255)",
            bodyFontColor: "#858796",
            borderColor: '#dddfeb',
            borderWidth: 1,
            xPadding: 15,
            yPadding: 15,
            displayColors: false,
            caretPadding: 10,
            },
            legend: {
            display: false
            },
            cutoutPercentage: 80,
        },
    });

    // Attach a click event listener to the chart canvas
    ctx.addEventListener('click', function(event) {
        // Get the clicked element
        var activeElement = myPieChartDept.getElementAtEvent(event);

        // Check if an element was clicked and if it's the "Active" part
        if (activeElement.length > 0 && activeElement[0]._model.label === 'Software Development') {
            // Trigger the modal when the "Active" part of the chart is clicked
            $('#softwareModal').modal('show');
        }
        else if (activeElement.length > 0 && activeElement[0]._model.label === 'Multimedia'){
            $('#multimediaModal').modal('show');
        }
        else if (activeElement.length > 0 && activeElement[0]._model.label === 'Cybersecurity'){
            $('#cyberModal').modal('show');
        }
        else{
            $('#networkModal').modal('show');
        }
    });
    </script>

    

<!-- Load Button Active Trainers -->
<script>
    $(document).ready(function () {
        // Active Trainers
        var currentPage = <?php echo $trainings->currentPage(); ?>; // Initial page for loading more data
        var lastPage = <?php echo $trainings->lastPage(); ?>; // Last available page


        var loadMoreBtn = $('#loadMoreBtn');

        loadMoreBtn.on('click', function () {
            var nextPage = currentPage + 1;

            if (nextPage <= lastPage) {
                // Only make an Ajax request if there is a next page
                var pageUrl = '{{ $trainings->url($trainings->currentPage() + 1) }}';

                // Load more data using Ajax
                $.ajax({
                    url: pageUrl,
                    type: 'GET',
                    success: function (data) {
                        var newItems = $(data).find('#trainersTable tbody').html();

                        if (newItems.trim() !== '') {
                            // If there are new items, append them to the table
                            $('#trainersTable tbody').append(newItems);
                            currentPage = nextPage; // Update the current page
                        } else {
                            // If no new items, disable the "Load More" button and display message
                            loadMoreBtn.prop('disabled', true);
                            $('#loadMoreContainer').html('<p>No more data to load</p>');
                        }
                    }
                });
            } else {
                // If there is no next page, disable the "Load More" button and display message
                loadMoreBtn.prop('disabled', true);
                $('#loadMoreContainer').html('<p>No more data to load</p>');
            }
        });
    });
</script>
<!-- End of load button Active Trainers -->

<!-- Load button Inactive Trainers -->
<script>
    $(document).ready(function () {
        // Inactive Trainers
        var currentPage = <?php echo $trainingsInactive->currentPage(); ?>; // Initial page for loading more data
        var lastPage = <?php echo $trainingsInactive->lastPage(); ?>; // Last available page


        var loadMoreBtnInactive = $('#loadMoreBtnInactive');

        loadMoreBtnInactive.on('click', function () {
            var nextPage = currentPage + 1;

            if (nextPage <= lastPage) {
                // Only make an Ajax request if there is a next page
                var pageUrl = '{{ $trainingsInactive->url($trainingsInactive->currentPage() + 1) }}';

                // Load more data using Ajax
                $.ajax({
                    url: pageUrl,
                    type: 'GET',
                    success: function (data) {
                        var newItems = $(data).find('#trainersTableInactive tbody').html();

                        if (newItems.trim() !== '') {
                            // If there are new items, append them to the table
                            $('#trainersTableInactive tbody').append(newItems);
                            currentPage = nextPage; // Update the current page
                        } else {
                            // If no new items, disable the "Load More" button and display message
                            loadMoreBtnInactive.prop('disabled', true);
                            $('#loadMoreContainerInactive').html('<p>No more data to load</p>');
                        }
                    }
                });
            } else {
                // If there is no next page, disable the "Load More" button and display message
                loadMoreBtnInactive.prop('disabled', true);
                $('#loadMoreContainerInactive').html('<p>No more data to load</p>');
            }
        });
    });
</script>
<!-- End of load button inactive -->

<!-- Load button Software Development Trainers -->
<script>
    $(document).ready(function () {
        // Software Trainers
        var currentPage = <?php echo $softwareTrainers->currentPage(); ?>; // Initial page for loading more data
        var lastPage = <?php echo $softwareTrainers->lastPage(); ?>; // Last available page


        var loadMoreBtnSoftware = $('#loadMoreBtnSoftware');

        loadMoreBtnSoftware.on('click', function () {
            var nextPage = currentPage + 1;

            if (nextPage <= lastPage) {
                // Only make an Ajax request if there is a next page
                var pageUrl = '{{ $softwareTrainers->url($softwareTrainers->currentPage() + 1) }}';

                // Load more data using Ajax
                $.ajax({
                    url: pageUrl,
                    type: 'GET',
                    success: function (data) {
                        var newItems = $(data).find('#softwareTable tbody').html();

                        if (newItems.trim() !== '') {
                            // If there are new items, append them to the table
                            $('#softwareTable tbody').append(newItems);
                            currentPage = nextPage; // Update the current page
                        } else {
                            // If no new items, disable the "Load More" button and display message
                            loadMoreBtnSoftware.prop('disabled', true);
                            $('#loadMoreContainerSoftware').html('<p>No more data to load</p>');
                        }
                    }
                });
            } else {
                // If there is no next page, disable the "Load More" button and display message
                loadMoreBtnSoftware.prop('disabled', true);
                $('#loadMoreContainerSoftware').html('<p>No more data to load</p>');
            }
        });
    });
</script>
<!-- End of load button inactive -->


<!-- Load button Software Development Trainers -->
<script>
    $(document).ready(function () {
        // Software Trainers
        var currentPage = <?php echo $softwareTrainers->currentPage(); ?>; // Initial page for loading more data
        var lastPage = <?php echo $softwareTrainers->lastPage(); ?>; // Last available page


        var loadMoreBtnSoftware = $('#loadMoreBtnSoftware');

        loadMoreBtnSoftware.on('click', function () {
            var nextPage = currentPage + 1;

            if (nextPage <= lastPage) {
                // Only make an Ajax request if there is a next page
                var pageUrl = '{{ $softwareTrainers->url($softwareTrainers->currentPage() + 1) }}';

                // Load more data using Ajax
                $.ajax({
                    url: pageUrl,
                    type: 'GET',
                    success: function (data) {
                        var newItems = $(data).find('#softwareTable tbody').html();

                        if (newItems.trim() !== '') {
                            // If there are new items, append them to the table
                            $('#softwareTable tbody').append(newItems);
                            currentPage = nextPage; // Update the current page
                        } else {
                            // If no new items, disable the "Load More" button and display message
                            loadMoreBtnSoftware.prop('disabled', true);
                            $('#loadMoreContainerSoftware').html('<p>No more data to load</p>');
                        }
                    }
                });
            } else {
                // If there is no next page, disable the "Load More" button and display message
                loadMoreBtnSoftware.prop('disabled', true);
                $('#loadMoreContainerSoftware').html('<p>No more data to load</p>');
            }
        });
    });
</script>
<!-- End of load button software trainers -->

<!-- Load button Multimedia Trainers -->
<script>
    $(document).ready(function () {
        // Software Trainers
        var currentPage = <?php echo $multimediaTrainers->currentPage(); ?>; // Initial page for loading more data
        var lastPage = <?php echo $multimediaTrainers->lastPage(); ?>; // Last available page


        var loadMoreBtnMultimedia = $('#loadMoreBtnMultimedia');

        loadMoreBtnMultimedia.on('click', function () {
            var nextPage = currentPage + 1;

            if (nextPage <= lastPage) {
                // Only make an Ajax request if there is a next page
                var pageUrl = '{{ $multimediaTrainers->url($multimediaTrainers->currentPage() + 1) }}';

                // Load more data using Ajax
                $.ajax({
                    url: pageUrl,
                    type: 'GET',
                    success: function (data) {
                        var newItems = $(data).find('#multimediaTable tbody').html();

                        if (newItems.trim() !== '') {
                            // If there are new items, append them to the table
                            $('#multimediaTable tbody').append(newItems);
                            currentPage = nextPage; // Update the current page
                        } else {
                            // If no new items, disable the "Load More" button and display message
                            loadMoreBtnMultimedia.prop('disabled', true);
                            $('#loadMoreContainerMultimedia').html('<p>No more data to load</p>');
                        }
                    }
                });
            } else {
                // If there is no next page, disable the "Load More" button and display message
                loadMoreBtnMultimedia.prop('disabled', true);
                $('#loadMoreContainerMultimedia').html('<p>No more data to load</p>');
            }
        });
    });
</script>
<!-- End of load button multimedia -->

<!-- Load button Cybersecurity Trainers -->
<script>
    $(document).ready(function () {
        // Cybersecurity Trainers
        var currentPage = <?php echo $cyberTrainers->currentPage(); ?>; // Initial page for loading more data
        var lastPage = <?php echo $cyberTrainers->lastPage(); ?>; // Last available page


        var loadMoreBtnCyber = $('#loadMoreBtnCyber');

        loadMoreBtnCyber.on('click', function () {
            var nextPage = currentPage + 1;

            if (nextPage <= lastPage) {
                // Only make an Ajax request if there is a next page
                var pageUrl = '{{ $cyberTrainers->url($cyberTrainers->currentPage() + 1) }}';

                // Load more data using Ajax
                $.ajax({
                    url: pageUrl,
                    type: 'GET',
                    success: function (data) {
                        var newItems = $(data).find('#cyberTable tbody').html();

                        if (newItems.trim() !== '') {
                            // If there are new items, append them to the table
                            $('#cyberTable tbody').append(newItems);
                            currentPage = nextPage; // Update the current page
                        } else {
                            // If no new items, disable the "Load More" button and display message
                            loadMoreBtnCyber.prop('disabled', true);
                            $('#loadMoreContainerCyber').html('<p>No more data to load</p>');
                        }
                    }
                });
            } else {
                // If there is no next page, disable the "Load More" button and display message
                loadMoreBtnCyber.prop('disabled', true);
                $('#loadMoreContainerCyber').html('<p>No more data to load</p>');
            }
        });
    });
</script>
<!-- End of load button cybersecurity -->

<!-- Load button Networking Trainers -->
<script>
    $(document).ready(function () {
        // Networking Trainers
        var currentPage = <?php echo $networkTrainers->currentPage(); ?>; // Initial page for loading more data
        var lastPage = <?php echo $networkTrainers->lastPage(); ?>; // Last available page


        var loadMoreBtnNetwork = $('#loadMoreBtnNetwork');

        loadMoreBtnNetwork.on('click', function () {
            var nextPage = currentPage + 1;

            if (nextPage <= lastPage) {
                // Only make an Ajax request if there is a next page
                var pageUrl = '{{ $networkTrainers->url($networkTrainers->currentPage() + 1) }}';

                // Load more data using Ajax
                $.ajax({
                    url: pageUrl,
                    type: 'GET',
                    success: function (data) {
                        var newItems = $(data).find('#networkTable tbody').html();

                        if (newItems.trim() !== '') {
                            // If there are new items, append them to the table
                            $('#networkTable tbody').append(newItems);
                            currentPage = nextPage; // Update the current page
                        } else {
                            // If no new items, disable the "Load More" button and display message
                            loadMoreBtnNetwork.prop('disabled', true);
                            $('#loadMoreContainerNetwork').html('<p>No more data to load</p>');
                        }
                    }
                });
            } else {
                // If there is no next page, disable the "Load More" button and display message
                loadMoreBtnNetwork.prop('disabled', true);
                $('#loadMoreContainerNetwork').html('<p>No more data to load</p>');
            }
        });
    });
</script>
<!-- End of load button networking -->


</body>

</html>