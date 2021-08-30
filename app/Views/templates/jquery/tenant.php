<!-- Get Api RajaOngkir -->
<script type="text/javascript">
    $(document).ready(function() {

        $('#create_province').change(function() {
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: `${baseUrl}/admin/tenant/createcity`,
                method: "POST",
                data: {
                    id: id
                },
                async: true,
                dataType: 'json',
                success: function(data) {
                    var jayson = JSON.parse(data);
                    var html = '';
                    var html2 = '';
                    var i;
                    for (i = 0; i < jayson.rajaongkir.results.length; i++) {
                        html += '<option data-province="' + jayson.rajaongkir.results[i].province + '" data-city="' + jayson.rajaongkir.results[i].city_name + '" data-code="' + jayson.rajaongkir.results[i].postal_code + '" value=' + jayson.rajaongkir.results[i].city_id + '>' + jayson.rajaongkir.results[i].city_name + '</option>';
                    }


                    $('#create_city').html(html);
                }
            });
            return false;
        });

    });
    $("#create_city").change(function() {
        var code = $(this).find(':selected').data('code');
        var name = $(this).find(':selected').data('city');
        var province = $(this).find(':selected').data('province');
        $('#postalcode').val(code);
        $('#provinsi_name').val(province);
        $('#city_name').val(name);
    });
</script>

<!-- Get Lat Long Maps -->
<script>
    var map = L.map('map').setView([-6.1753871, 106.8249641], 10);

    var osm = new L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png').addTo(map);

    L.Control.geocoder({
        position: 'topleft',
        expand: 'click',
        defaultMarkGeocode: false
    }).on('markgeocode', function(e) {
        map.setView(e.geocode.center, 15);
    }).addTo(map);

    var theMarker = {};

    map.on('click', function(e) {

        lat = e.latlng.lat;
        lon = e.latlng.lng;

        console.log(lat + "/" + lon);
        //Clear existing marker, 

        if (theMarker != undefined) {
            map.removeLayer(theMarker);
        };

        //Add a marker to show where you clicked.
        theMarker = L.marker([lat, lon]).addTo(map);
        $('#lat').val(lat);
        $('#long').val(lon);

    });
</script>

<script>
    storetenant = () => {
        let fd = new FormData();
        let nama = $("#namatenant").val();
        let nohp = $("#nohp").val();
        let address = $('textarea#address').val();
        let district = $("#district").val();
        let id_district = $("#id_district").val();
        let provinsi = $("#create_province").val();
        let provinsi_name = $("#provinsi_name").val();
        let city = $("#create_city").val();
        let city_name = $("#city_name").val();
        let postal = $("#postalcode").val();
        let owner = $("#owner").val();
        let lat = $("#lat").val();
        let long = $("#long").val();
        // console.log(
        //     "tenant_name : " + nama + " " +
        //     "tenant_address : " + address + " " +
        //     "tenant_phone : " + nohp + " " +
        //     "tenant_logo : Nyusul" + " " +
        //     "tenant_lat : " + lat + " " +
        //     "tenant_long : " + long + " " +
        //     "postal_code : " + postal + " " +
        //     "owner : " + owner + " " +
        //     "province_id : " + provinsi + " " +
        //     "city_id : " + city + " " +
        //     "sub_district_id : " + district + " " +
        //     "province : " + provinsi + " " +
        //     "city : " + city + " " +
        //     "sub_district : " + district
        // );
        fd.append('nama', nama);
        fd.append('nohp', nohp);
        fd.append('address', address);
        fd.append('district', district);
        fd.append('iddistrict', id_district);
        fd.append('provinsi', provinsi);
        fd.append('provinsiname', provinsi_name);
        fd.append('city', city);
        fd.append('cityname', city_name);
        fd.append('postal', postal);
        fd.append('owner', owner);
        fd.append('lat', lat);
        fd.append('long', long);

        $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/tenant/posttenant`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                swal("Successfully", "Tenant Created", "success");
                location.href = `${baseUrl}/admin/tenant/listtenant`;
            }
        })
    }
</script>