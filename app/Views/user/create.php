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
                                        <li class="breadcrumb-item active">Create Users</li>
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
                                        <form action="" method="post">
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Nama Lengkap</label>
                                                    <input type="text" id="namalengkap" class="form-control" placeholder="Nama Lengkap..." />
                                                </div>
                                                <div class="col-6">
                                                    <label>No KTP</label>
                                                    <input type="number" id="noktp" class="form-control" placeholder="No. KTP..." />
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Gender</label>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio1" value="male" name="gender" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio1">Male</label>
                                                    </div>
                                                    <div class="custom-control custom-radio">
                                                        <input type="radio" id="customRadio2" value="female" name="gender" class="custom-control-input">
                                                        <label class="custom-control-label" for="customRadio2">Female</label>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <label>Alamat Email</label>
                                                    <input type="email" id="alamatemail" class="form-control" placeholder="Alamat Email..." />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label>Nomor HP</label>
                                                    <input type="number" id="nomorhp" class="form-control" placeholder="Nomor HP..." />
                                                </div>
                                                <div class="col-6">
                                                    <label>Password</label>
                                                    <input type="password" id="password" class="form-control" placeholder="Password..." />
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" onclick="storeuser()" class="btn btn-primary">Create User</button>
                                                </div>
                                            </div>
                                        </form>
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
    <?= $this->include("templates/jquery/user.php") ?>

</body>

</html>