<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('../assets') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('../assets') }}/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('../assets') }}/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">

            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">



            <!-- Admin Menu -->
            @if (Auth::user()->role_id == 1)
                <!-- Nav Item - Dashboard -->
                <li class="nav-item {{ request()->is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="/home">
                        <i class="fas fa-fw fa-tachometer-alt"></i>
                        <span>Dashboard</span></a>
                </li>

                <!-- Divider -->
                <hr class="sidebar-divider">
                <!-- Nav Item - Charts -->
                <li class="nav-item {{ request()->is('admin/pendaftaran*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/pendaftaran">
                        <i class="fas fa-fw fa-chart-area"></i>
                        <span>Pendaftaran</span></a>
                </li>

                <!-- Nav Item - Tables -->
                <li class="nav-item {{ request()->is('admin/pembayaran*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/pembayaran">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Pembayaran</span></a>
                </li>

                <li class="nav-item {{ request()->is('admin/jadwal-pelatihan*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/jadwal-pelatihan">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Jadwal Pelatihan</span></a>
                </li>

                <li class="nav-item {{ request()->is('pelatihan*') ? 'active' : '' }}">
                    <a class="nav-link" href="/pelatihan">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Pelatihan</span></a>
                </li>

                <li class="nav-item {{ request()->is('admin/users*') ? 'active' : '' }}">
                    <a class="nav-link" href="/users">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Users</span></a>
                </li>
            @endif

            <!-- Bendahara Menu -->
            @if (Auth::user()->role_id == 2)
                <!-- Nav Item - Tables -->
                <li class="nav-item {{ request()->is('admin/pembayaran/kode-billing*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/pembayaran/kode-billing">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Menunggu Kode Billing</span></a>
                </li>
                <li class="nav-item {{ request()->is('admin/bukti-pembayaran*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/bukti-pembayaran">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Bukti Pembayaran</span></a>
                </li>
                <li class="nav-item {{ request()->is('admin/pembayaran') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/pembayaran">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Data Pembayaran</span></a>
                </li>
            @endif

            <!-- Instruktur Menu -->
            @if (Auth::user()->role_id == 3)
                <li class="nav-item {{ request()->is('admin/jadwal-pelatihan/tambah*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/jadwal-pelatihan/tambah">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Tambah Jadwal Pelatihan</span></a>
                </li>
                <li
                    class="nav-item {{ request()->is('admin/jadwal-pelatihan*') && !request()->is('admin/jadwal-pelatihan/tambah*') ? 'active' : '' }}">
                    <a class="nav-link" href="/admin/jadwal-pelatihan">
                        <i class="fas fa-fw fa-table"></i>
                        <span>Jadwal Pelatihan</span></a>
                </li>
            @endif


            <!-- Logout Menu -->
            <li class="nav-item">
                <a class="nav-link" href="/">
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="btn btn-primary" type="submit">
                            <i class="fas fa-fw fa-table"></i>
                            <span>Logout</span>
                        </button>
                    </form>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

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

                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small"
                                placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span
                                    class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->name }}</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="">

                    <div class="container-fluid">
                        @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    </div>
                    @yield('content')




                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->


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
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('../assets') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('../assets') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('../assets') }}/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('../assets') }}/js/sb-admin-2.min.js"></script>

    <script src="{{ asset('../assets') }}/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="{{ asset('../assets') }}/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('../assets') }}/js/demo/datatables-demo.js"></script>' 

</body>

</html>
