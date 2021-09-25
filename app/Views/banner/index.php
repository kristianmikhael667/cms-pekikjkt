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
                                        <li class="breadcrumb-item active">All Banner</li>
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
                                                    <th>Title</th>
                                                    <th>URL Link</th>
                                                    <th>Description</th>
                                                    <th>Media Type</th>
                                                    <th>Banner</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no = 1;
                                                foreach ($banners as $banner) :
                                                ?>
                                                    <tr>
                                                        <td><?php echo $no++ ?></td>
                                                        <td><?php echo $banner->title ?></td>
                                                        <td><?php echo $banner->launch_url ?></td>
                                                        <td><?php echo $banner->desc ?></td>
                                                        <td><?php echo $banner->media_type ?></td>
                                                        <td><img style="width: 200; height:100px" class="img-fluid img-thumbnail" src="<?php echo $banner->media_url ?>" /> </td>

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
    <?= $this->include("user/modal_detail_user.php") ?>

    <?= $this->include("templates/jquery/jquery.php") ?>
    <?= $this->include("templates/jquery/user.php") ?>
</body>

</html>