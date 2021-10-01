<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Addons
            </div>

            

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
               

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        

            

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">Pierre McGee</span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
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
                    <br>
                    <a href="clients.php?id=1"> <button class="btn btn-success" type="button" data-dismiss="modal"> Clients > 200$ </button></a>
                    <a href="clients.php?id=2"> <button class="btn btn-danger" type="button" data-dismiss="modal"> Clients < 0$ </button></a>
                    <a href="clients.php?id=3"> <button class="btn btn-warning" type="button" data-dismiss="modal"> 0$ < Clients < 200$ </button></a> 
                    <a href="index.php"> <button class="btn btn-primary" type="button" data-dismiss="modal"> ALL </button></a> <br><br>

                    <div class="row">
                    <?php require 'connection.php';
                        $myC = new myConnection();
                        $myid = $_GET['id'];

                        if($myid == 1 ){
                            $monClient = $myC->getClients1();

                        }
                        elseif($myid == 2){
                            $monClient = $myC->getClients2();

                        }
                        else {
                            $monClient = $myC->getClients3();

                        }
                        $success = "danger";
                        while ($row = $monClient -> fetch()) {
                            if($row['solde'] > 200){
                                $success = "success";
                            }
                            elseif($row['solde'] > 0 && $row['solde'] <= 200){
                                $success = "warning";
                            }
                            else{
                                $success = "danger";
                            }
                            
                    ?>
                       <br>
                        
                        <div class="col-xl-3 col-md-6 mb-4">
                           <?php echo '<div class="card border-left-' . $success. ' shadow h-100 py-2">'; ?>
                                        <div class="card-body">
                                            <div class="row no-gutters align-items-center">
                                                    <div class="col mr-2">
                                                    <div>
                            <ul>
                            <li><?php echo $row['civilite']. " " . $row['nomCli'] ." ". $row['prenomCli']; ?></li>
                            <li>tel : <?php echo $row['tel']; ?></li>
                            <li>Agence : <?php echo $row['nomAgence']; ?></li>
                            <ul>
                    
                        </div>
                                                        <?php echo '<div class="text-xs font-weight-bold text-' . $success . 'text-uppercase mb-1">
                                                                   <h5> Solde</h5> </div>'; ?>
                                                        <div class="h5 mb-0 font-weight-bold text-<?php echo $success;?> -800"><?php echo $row['solde'] ;?>$ <br><br>   <a href="tables.php?id=<?php echo $row['id_cli'].'"';?>> <button type="button" class="btn btn-outline-primary">Détails </button></a>
</div>
                                                    </div>
                                                    
                                            <div class="col-auto">

                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>

                                            </div>
                                                </div>
                                        </div>
                                </div>
                            </div>
                            <?php }?>
                        </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Agile Banque Projet 2021</span>
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
                    <a class="btn btn-primary" href="login.html">Logout</a>
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

</body>

</html>