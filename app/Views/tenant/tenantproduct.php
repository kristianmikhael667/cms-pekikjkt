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
                                <!-- <h4 class="mb-0 font-size-18">All Users</h4> -->

                                <div class="page-title-right">
                                    <ol class="breadcrumb mr-2">
                                        <li class="breadcrumb-item"><a href="javascript: void(0);">PeKiKJKT</a></li>
                                        <li class="breadcrumb-item active">Product Created Users </li>
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
                            <div class="col-12">
                                <div class="card" style="border-radius: 20px;">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <a href="<?= base_url('admin/tenant/excel') ?>" class="btn btn-outline-success float-right mt-1 mb-1">Excel <i class="fa fa-file-excel"></i></a>
                                            </div>
                                        </div>
                                        <table id="user-lists" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name Tenant</th>
                                                    <th>Phone Number</th>
                                                    <th>Address Tenant</th>
                                                    <th>Tenant Type</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <?php $no = 1;
                                                $counter = 0;
                                                foreach ($tenant as $nand) :
                                                    foreach ($product as $pro) :
                                                        if ($nand->_id === $pro->tenant_id) :
                                                ?>
                                                            <tr>
                                                                <td><?php echo $no++ ?></td>
                                                                <td><?php echo $nand->tenant_name ?></td>
                                                                <td><?php echo $nand->tenant_phone ?></td>
                                                                <td><?php echo $nand->tenant_address ?></td>
                                                                <td><?php echo $nand->tenant_type ?></td>

                                                            </tr>
                                                            <?php $counter++; ?>
                                                            <?php if ($counter >= 1) {
                                                                break;
                                                            } ?>
                                                        <?php endif ?>
                                                    <?php endforeach ?>
                                                <?php endforeach ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

    </div>
    </div>
    </section>
    </div>


    <?= $this->include("templates/jquery/jquery.php") ?>

</body>

</html>