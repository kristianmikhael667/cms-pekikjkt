<?= $this->include('Views/templates/admin/head') ?>

<!-- <meta http-equiv="refresh" content="300" /> -->

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
                                        <li class="breadcrumb-item active">All Tenant</li>
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
                                        <table id="user-lists" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>ID</th>
                                                    <th>Owner</th>
                                                    <th>Tenant Name</th>
                                                    <th>Tenant Address</th>
                                                    <th>Tenant Phone</th>
                                                    <th>Tenant Type</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($tenants as $tenant) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $tenant->_id ?></td>
                                                        <td><?php echo $tenant->owner ?></td>
                                                        <td><?php echo $tenant->tenant_name ?></td>
                                                        <td><?php echo $tenant->tenant_address ?></td>
                                                        <td><?php echo $tenant->tenant_phone ?></td>
                                                        <td><?php echo $tenant->tenant_type ?></td>
                                                        <td width="125">
                                                            <button onclick="detailTenant('<?= $tenant->_id ?>')" type="button" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-bars"></i>
                                                            </button>
                                                            <button onclick="editTenant('<?= $tenant->_id ?>')" type="button" class="btn btn-primary btn-sm">
                                                                <i class="far fa-edit"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
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

    <?= $this->include("tenant/modal_detail_tenant.php") ?>
    <?= $this->include("tenant/modal_edit_tenant.php") ?>
    <?= $this->include("templates/jquery/tenant.php") ?>
    <?= $this->include("templates/jquery/jquery.php") ?>

</body>

</html>