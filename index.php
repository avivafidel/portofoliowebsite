<!DOCTYPE html>
<html lang="en">
<?php
require_once 'koneksi.php';
ob_start();
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
session_start();

// Cek apakah pengguna sudah login, jika tidak, arahkan ke login.php
if (!isset($_SESSION['username'])) { // Gantilah 'username' sesuai dengan yang Anda gunakan untuk menyimpan sesi
    header("location: login.php");
    exit();
}

// Konten halaman index.php
?>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,
shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title> DASHBOARD AVIVAFI</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet"
        type="text/css">
    <link

        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400
,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark
accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center
justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3"> AVIVA FIDELIMA </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="?">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"
                    data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Master</span>
                </a>
                <div id="collapseTwo" classF="collapse"
                    aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item"
                            href="?page=supliyer">Supliyer</a>
                        <a class="collapse-item"
                            href="?page=transaksi">Transaksi</a>
                        <a class="collapse-item"
                            href="?page=supir">Supir</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>
            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"
                    data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapsePages" class="collapse"
                    aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Transaksi</h6>
                        <a class="collapse-item"
                            href="?page=pembelian">Pembelian</a>
                        <a class="collapse-item"
                            href="?page=pinjaman">Pinjaman</a>
                    </div>

                </div>
            </li>
            <hr class="sidebar-divider">
            <!-- Nav Item - Pages Collapse Menu -->
            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <li class="nav-item">
                <a class="nav-link collapsed" href="#"
                    data-toggle="collapse" data-target="#collapseLap"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Laporan</span>
                </a>
                <div id="collapseLap" class="collapse"
                    aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Laporan</h6>
                        <a class="collapse-item" href="login.html">Laporan
                            Pembelian</a>
                        <a class="collapse-item"
                            href="register.html">Laporan Pinjaman</a>
                    </div>
                </div>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">
            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0"
                    id="sidebarToggle"></button>
            </div>
        </ul>
        <!-- End of Sidebar -->
        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">
                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white
topbar mb-4 static-top shadow">
                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link
d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>
                    <!-- Topbar Search -->
                    <form
                        class="d-none d-sm-inline-block form-inline
mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control
bg-light border-0 small" placeholder="Search for..."
                                aria-label="Search"
                                aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary"
                                    type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Search Dropdown (Visible Only XS)
-->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#"
                                id="searchDropdown" role="button"
                                data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right
p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100
navbar-search">
                                    <div class="input-group">
                                        <input type="text"
                                            class="form-control bg-light border-0 small"
                                            placeholder="Search for..."
                                            aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn
btn-primary" type="button">
                                                <i class="fas fa-search
fa-sm"></i>
                                            </button>
                                        </div>
                                        class="d-none d-sm-inline-block form-inline
                                        mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control
bg-light border-0 small" placeholder="Search for..."
                                                aria-label="Search"
                                                aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"
                                                    type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                </form>


                                    <div class="topbar-divider d-none
d-sm-block"></div>
                                    <!-- Nav Item - User Information -->
                                    <li class="nav-item dropdown no-arrow">
                                        <a class="nav-link dropdown-toggle" href="#"
                                            id="userDropdown" role="button"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <span class="mr-2 d-none d-lg-inline
text-gray-600 small">Aviva Fidelima</span>
                                            <img class="img-profile rounded-circle"
                                                src="img/image.jpg">
                                        </a>
                                        <!-- Dropdown - User Information -->
                                        <div class="dropdown-menu dropdown-menu-right
shadow animated--grow-in"
                                            aria-labelledby="userDropdown">
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user fa-sm fa-fw mr-2
text-gray-400"></i>
                                                Profile
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-cogs fa-sm fa-fw mr-2
text-gray-400"></i>
                                                Settings
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-list fa-sm fa-fw mr-2
text-gray-400"></i>
                                                Activity Log
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#"
                                                data-toggle="modal" data-target="#logoutModal">
                                                <i class="fas fa-sign-out-alt fa-sm
fa-fw mr-2 text-gray-400"></i>
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
                    <div class="d-sm-flex align-items-center
justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Data
                            Avivafi</h1>
                        <a href="#" class="d-none d-sm-inline-block btn
btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm
text-white-50"></i> Buat Laporan</a>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <?php if (isset($_GET['page'])) {
                            if ($_GET["page"] == "supliyer") {
                                include "supliyer.php";
                            } elseif ($_GET["page"] == "supir") {
                                include "supir.php";
                            }elseif ($_GET["page"] == "pembelian") {
                                include "pembelian.php";
                        
                            } {
                            }
                        } else { ?>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-primary
shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters
align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs
font-weight-bold text-primary text-uppercase mb-1">
                                                    Pembelian
                                                    (Monthly)</div>
                                                <div class="h5 mb-0
font-weight-bold text-gray-800">Rp.40,000,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-calendar
fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-success
shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters
align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs
font-weight-bold text-success text-uppercase mb-1">
                                                    Peminjaman
                                                    (Monthly)</div>
                                                <div class="h5 mb-0
font-weight-bold text-gray-800">Rp.2,215,000</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas
fa-dollar-sign fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Earnings (Monthly) Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-info shadow
h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters
align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs
font-weight-bold text-info text-uppercase mb-1">Target
                                                </div>
                                                <div class="row no-gutters
align-items-center">
                                                    <div class="col-auto">
                                                        <div class="h5
mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                                    </div>
                                                    <div class="col">
                                                        <div
                                                            class="progress progress-sm mr-2">
                                                            <div
                                                                class="progress-bar bg-info" role="progressbar"
                                                                style="width: 50%" aria-valuenow="50" aria-valuemin="0"
                                                                aria-valuemax="100"></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas
fa-clipboard-list fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Pending Requests Card Example -->
                            <div class="col-xl-3 col-md-6 mb-4">
                                <div class="card border-left-warning
shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters
align-items-center"> 
                                            <div class="col mr-2">
                                                <div class="text-xs
font-weight-bold text-warning text-uppercase mb-1">
                                                    Supliyer</div>
                                                <div class="h5 mb-0
font-weight-bold text-gray-800">18</div>
                                            </div>
                                            <div class="col-auto">
                                                <i class="fas fa-comments
fa-2x text-gray-300"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                    <!-- Content Row -->
                    <div class="row">
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex
flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold
text-primary">Grafik Pembelian </h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle"
                                            href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v
fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu
dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div
                                                class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item"
                                                href="#">Action</a>
                                            <a class="dropdown-item"
                                                href="#">Another action</a>
                                            <div
                                                class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                                href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                        <canvas id="myAreaChart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex
flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold
text-primary">Aviva Fidelima</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle"
                                            href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v
fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu
dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div
                                                class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item"
                                                href="#">Action</a>
                                            <a class="dropdown-item"
                                                href="#">Another action</a>
                                            <div
                                                class="dropdown-divider"></div>
                                            <a class="dropdown-item"
                                                href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <img class="w-100" style="object-fit: cover; object-position: 0px -100px;" width="200" height="340" src="./img/anggrek1.jpg">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Content Row -->
                <?php } ?>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End of Main Content -->
            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready
                        to Leave?</h5>
                    <button class="close" type="button"
                        data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are
                    ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button"
                        data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>
    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>
</body>

</html>