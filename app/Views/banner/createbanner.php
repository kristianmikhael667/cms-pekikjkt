<?= $this->include('Views/templates/admin/head') ?>
<style>
    #map {
        width: 100%;
        height: 100%;
        z-index: 100;
    }

    #mapSearchContainer {
        position: fixed;
        top: 20px;
        right: 40px;
        height: 30px;
        width: 180px;
        z-index: 110;
        font-size: 10pt;
        color: #5d5d5d;
        border: solid 1px #bbb;
        background-color: #f8f8f8;
    }

    .pointer {
        position: absolute;
        top: 86px;
        left: 60px;
        z-index: 99999;
    }
</style>
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
                                        <li class="breadcrumb-item active">Create Banner</li>
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
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Title Banner</label>
                                                    <input type="text" id="titlebanner" class="form-control" placeholder="Title Banner ..." />
                                                </div>
                                                <div class="col-6">
                                                    <label>Media Type</label>
                                                    <input type="text" readonly value="image" id="mediatype" class="form-control" placeholder="Media Type ..." />
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label for="address">Description Banner</label>
                                                    <textarea class="form-control" id="descriptionbanner" rows="1"></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label>Media Banner</label>
                                                    <input type="file" name="mediabanner" id="mediabanner" class="dropify" data-height="200">
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label>Launch URL</label>
                                                    <input type="text" id="launchurl" class="form-control" placeholder="Link URL..." />
                                                </div>
                                                <div class="col-6">
                                                    <label>Is Internal Launch</label>
                                                    <input type="text" readonly value="true" id="isinternallaunch" class="form-control" placeholder="Media Type ..." />
                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" onclick="storebanner()" class="btn btn-primary">Create Banner</button>
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
    <?= $this->include("templates/jquery/banner.php") ?>

</body>

</html>