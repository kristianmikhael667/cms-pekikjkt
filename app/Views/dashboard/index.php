<?= $this->include('Views/templates/admin/head') ?>

<meta http-equiv="refresh" content="300" />

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?= $this->include("templates/admin/navbar.php") ?>

        <!-- Main Sidebar Container -->
        <?= $this->include("templates/admin/sidebar.php") ?>

        <div class="content-wrapper">

            <div class="content-header">
                <div class="ml-5 mb-5">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <!-- <h4 class="mb-0 font-size-18">Dashboard Admin</h4> -->

                                <div class="page-title-right">
                                    <ol class="breadcrumb mr-2">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">PeKiKJKT</a></li>
                                        <li class="breadcrumb-item active">Dashboard</li>
                                    </ol>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- Main content -->
                <section class="content">
                    <div class="container-fluid">
                        <div class="row">

                            <!-- <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger" style="background-color: #aff6cf; background-image: linear-gradient(315deg, #aff6cf 0%, #9f98e8 74%); ">
                                    <div class="inner">
                                        <h3>20</h3>
                                        <p>Total Category</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-cube"></i>
                                    </div>
                                    <a href="<?= base_url('admin/products/list') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div> -->

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger" style="background-color: #f876de; background-image: linear-gradient(315deg, #f876de 0%, #b9d1eb 74%);">
                                    <div class="inner">
                                        <h3>10</h3>
                                        <p>Users</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person-stalker"></i>
                                    </div>
                                    <a href="<?= base_url('admin/users/list') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger" style="background-color: #bdd8fe; background-image: linear-gradient(315deg, #bdd8fe 0%, #e186b4 74%); ">
                                    <div class="inner">
                                        <h3>21</h3>
                                        <p>Banned User</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-close-circled"></i>
                                    </div>
                                    <a href="<?= base_url('admin/user-roles/vendor-user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger" style="background-color: #9f98e8 ;background-image: linear-gradient(315deg, #9f98e8  0%, #aacaef 74%);">
                                    <div class="inner">
                                        <h3>54</h3>
                                        <p>User Merchant</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-bag"></i>
                                    </div>
                                    <a href="<?= base_url('admin/user-roles/courier-user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                            <div class="col-lg-3 col-6">
                                <div class="small-box bg-danger" style="background-color: #9f98e8 ;background-image: linear-gradient(315deg, #9f98e8  0%, #aacaef 74%);">
                                    <div class="inner">
                                        <h3>54</h3>
                                        <p>User DKI</p>
                                    </div>
                                    <div class="icon">
                                        <i class="ion ion-person"></i>
                                    </div>
                                    <a href="<?= base_url('admin/user-roles/courier-user') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                </div>
                            </div>

                        </div>
                    </div>

                    <!-- container fluid -->

                    <!-- /.card-footer -->
            </div>
        </div> <!-- /.card -->
        <!-- end recently -->



    </div>
    </div>

    <!-- /.card -->

    </section>
    </div>


    <?= $this->include("templates/jquery/jquery.php") ?>

</body>

</html>