<!-- jQuery -->
<script src="<?= base_url('/adminLTE-3/plugins/jquery/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('/adminLTE-3/plugins/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<!-- DataTables -->
<script src="<?= base_url('/adminLTE-3/plugins/datatables/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('/adminLTE-3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') ?>"></script>
<script src="<?= base_url('/adminLTE-3/plugins/datatables-responsive/js/dataTables.responsive.min.js') ?>"></script>
<script src="<?= base_url('/adminLTE-3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') ?>"></script>

<!--dropify-->
<script src="<?= base_url('/plugins/dropify/dropify.min.js') ?>"></script>
<script src="<?= base_url('/plugins/pages/fileuploads-demo.js') ?>"></script>

<!-- Bootstrap 4 -->
<script src="<?= base_url('/adminLTE-3/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<!-- ChartJS -->
<script src="<?= base_url('/adminLTE-3/plugins/chart.js/Chart.min.js') ?>"></script>
<!-- JQVMap -->
<script src="<?= base_url('/adminLTE-3/plugins/jqvmap/jquery.vmap.min.js') ?>"></script>
<script src="<?= base_url('/adminLTE-3/plugins/jqvmap/maps/jquery.vmap.usa.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?= base_url('/adminLTE-3/plugins/jquery-knob/jquery.knob.min.js') ?>"></script>
<!-- Jquery Lazy -->
<script src="<?= base_url('/adminLTE-3/plugins/jquery-lazy/jquery.lazy.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?= base_url('/adminLTE-3/plugins/moment/moment.min.js') ?>"></script>
<script src="<?= base_url('/adminLTE-3/plugins/daterangepicker/daterangepicker.js') ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url('/adminLTE-3/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') ?>"></script>
<!-- Summernote -->
<script src="<?= base_url('/adminLTE-3/plugins/summernote/summernote-bs4.min.js') ?>"></script>
<!-- Sweetalert 2 -->
<script src="<?= base_url('/adminLTE-3/plugins/sweetalert2/sweetalert2.min.js') ?>"></script>
<!-- overlayScrollbars -->
<script src="<?= base_url('/adminLTE-3/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('/adminLTE-3/dist/js/adminlte.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?= base_url('/adminLTE-3/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?= base_url('/adminLTE-3/dist/js/demo.js') ?>"></script>
<!-- CDN DatePicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<!-- Alert -->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- Leaflet -->
<script src="http://cdn.leafletjs.com/leaflet-0.7.3/leaflet.js"></script>
<script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>
<script>
    $('#user-lists').DataTable({
        responsive: true,
        autoWidth: false
    });
</script>

<!-- CONSTANT -->
<script>
    const baseUrl = '<?= base_url(); ?>';
    const apiUrl = '<?= getenv('API_URL') ?>';
</script>

<!-- LOGOUT -->
<script>
    logout = async () => {
        Swal.fire({
            title: 'Are you sure want to logout?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes'
        }).then(async (result) => {
            if (result.value) {
                await $.ajax({
                    type: "POST",
                    url: `${baseUrl}/admin/auth/logout`,
                    success: function(data) {
                        window.location.reload();
                    }
                });
            }
        });
    }
</script>


</body>

</html>