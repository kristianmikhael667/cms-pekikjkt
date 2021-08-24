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
                                        <li class="breadcrumb-item active">Create Tenant</li>
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
                                                    <label>Tenant Name</label>
                                                    <input type="text" id="namalengkap" class="form-control" placeholder="Nama Lengkap..." />
                                                </div>
                                                <div class="col-6">
                                                    <label>Tenant Phone</label>
                                                    <input type="number" id="noktp" class="form-control" placeholder="No. KTP..." />
                                                </div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-6">
                                                    <label for="exampleFormControlTextarea1">Tenant Address</label>
                                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="1"></textarea>
                                                </div>
                                                <div class="col-6">
                                                    <label>Sub District</label>
                                                    <input type="password" id="password" class="form-control" placeholder="Sub District ..." />
                                                </div>

                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-4">
                                                    <label>Provinsi</label>
                                                    <select class="custom-select operator" id="create_province">
                                                        <option disabled selected>Choose Province ...</option>
                                                        <?php foreach ($provinsi as $prof) : ?>
                                                            <option value="<?= $prof->province_id ?>"><?= $prof->province ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label>City</label>
                                                    <select class="custom-select" id="create_city">
                                                        <option value="" selected>Choose City ...</option>
                                                    </select>
                                                </div>
                                                <div class="col-4">
                                                    <label>Postal Code</label>
                                                    <input type="text" readonly id="postalcode" class="form-control" placeholder="Postal Code" />
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-6">
                                                    <label>Owner</label>
                                                    <select class="custom-select operator" id="">
                                                        <option disabled selected>Choose Owner ...</option>
                                                        <?php foreach (allUsers()->data as $ad) : ?>
                                                            <option value="<?= $ad->_id ?>"><?= $ad->name ?></option>
                                                        <?php endforeach; ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <label>Maps</label>
                                                    <div class="form-group">
                                                        <div id="map" style="width: 100%; height: 300px; z-index:1"></div>
                                                        <input type="hidden" id="lat" name="lat_user">
                                                        <input type="hidden" id="long" name="long_user">

                                                        <input type="hidden" name="lat_user_exist" value="<?php echo session('latitude') ?>">
                                                        <input type="hidden" name="long_user_exist" value="<?php echo session('longitude') ?>">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-6">
                                                    <button type="button" onclick="storetenant()" class="btn btn-primary">Create Tenant</button>
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
    <?= $this->include("templates/jquery/tenant.php") ?>

</body>

</html>