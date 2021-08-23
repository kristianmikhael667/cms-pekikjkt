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
                                        <li class="breadcrumb-item active">Users Seller</li>
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
                                                    <th>Full Name</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Role ID</th>
                                                    <!-- <th>Action</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($users as $dt) :
                                                    if ($dt->role == "seller") :
                                                ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $dt->name ?></td>
                                                            <td><?php echo $dt->email ?></td>
                                                            <td><?php echo $dt->phone_number ?></td>
                                                            <td><?php echo $dt->role ?></td>
                                                            <!-- <td width="125">
                                                            <button onclick="detailUser()" type="button" class="btn btn-primary btn-sm">
                                                                <i class="fas fa-bars"></i>
                                                            </button>
                                                            <button onclick="editUser()" type="button" class="btn btn-primary btn-sm">
                                                                <i class="far fa-edit"></i>
                                                            </button>
                                                        </td> -->
                                                        </tr>
                                                    <?php endif ?>
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