<?= $this->include('Views/templates/admin/head') ?>
<?php

header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=Data Product Created Tenant.xls")

?>
<html>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>ID</th>
                    <th>Name Tenant</th>
                    <th>Phone Number</th>
                    <th>Address Tenant</th>
                    <th>Latitude</th>
                    <th>Longitude</th>
                    <th>Postal Code</th>
                    <th>City</th>
                    <th>Province</th>
                    <th>Sub District</th>
                    <th>Tenant Type</th>
                    <th>ID Owner</th>
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
                                <td><?php echo $nand->_id ?></td>
                                <td><?php echo $nand->tenant_name ?></td>
                                <td><?php echo $nand->tenant_phone ?></td>
                                <td><?php echo $nand->tenant_address ?></td>
                                <td><?php echo $nand->tenant_lat ?></td>
                                <td><?php echo $nand->tenant_long ?></td>
                                <td><?php echo $nand->postal_code ?></td>
                                <td><?php echo $nand->city ?></td>
                                <td><?php echo $nand->province ?></td>
                                <td><?php echo $nand->sub_district ?></td>
                                <td><?php echo $nand->tenant_type ?></td>
                                <td><?php echo $nand->owner ?></td>
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
</body>

</html>