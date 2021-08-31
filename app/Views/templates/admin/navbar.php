<?php

use Config\Services;

$request = Services::request();
?>
<nav class="main-header navbar navbar-expand navbar-white navbar-light">

    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <?php
            // die(dd($request->uri->getSegment(3)));
            switch ($request->uri->getSegment(3)) {

                case 'list':
                    echo '<div class="row">
              <h3 class="ml-3 text-dark">List Users</h3>
              </div>';
                    break;
                case 'createuser':
                    echo '<div class="row">
                  <h3 class="ml-3 text-dark">Create Users</h3>
                  </div>';
                    break;
                case 'seller':
                    echo '<div class="row">
                  <h3 class="ml-3 text-dark">Users Seller</h3>
                  </div>';
                    break;
                case 'transaction':
                    echo '<div class="row">
                <h3 class="ml-3 text-dark">List Transaksi</h3>
                </div>';
                    break;
                case 'listtenant':
                    echo '<div class="row">
                    <h3 class="ml-3 text-dark">List Tenant</h3>
                    </div>';
                    break;
                case 'createtenant':
                    echo '<div class="row">
                        <h3 class="ml-3 text-dark">Create Tenant</h3>
                        </div>';
                    break;
                case 'productcreatedtenant':
                    echo '<div class="row">
                    <h3 class="ml-3 text-dark">Product Created Tenant</h3>
                    </div>';
                    break;
                default;
                    echo '<div class="row">
                    <h3 class="ml-3 text-dark">Dashboard</h3>
                    </div>';
                    break;
            }
            ?>

            <?php
            switch ($request->uri->getSegment(3)) {
                case 'dashboard':
                    echo '<h4 class="ml-2 text-dark">Dashboard</h4>';
                    break;
                case 'products':
                    echo '<div class="row">
              <h4 class="ml-3 text-dark">List Product</h4>
            </div>';
                    break;
                case 'banneduser':
                    echo '<div class="row">
              <h4 class="ml-3 text-dark">Banned Users</h4>
            </div>';
                    break;
                case 'merchantuser':
                    echo '<div class="row">
            <h4 class="ml-3 text-dark">Merchant Users</h4>
          </div>';
                    break;
                case 'dkiuser':
                    echo '<div class="row">
            <h4 class="ml-3 text-dark">DKI Users</h4>
          </div>';
                    break;
                case 'adminuser':
                    echo '<div class="row">
            <h4 class="ml-3 text-dark">Admin Users</h4>
          </div>';
                    break;
                case 'admin-user':
                    echo '<div class="row">
            <h4 class="ml-3 text-dark">Admin</h4>
          </div>';
                    break;
                case 'vendor-user':
                    echo '<div class="row">
            <h4 class="ml-3 text-dark">Vendor User</h4>
          </div>';
                    break;
                default;
                    break;
            }
            ?>
        </li>
    </ul>
</nav>