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
    detailTenant = async (id) => {
        $("#detailtenant").modal('show');
        let fd = new FormData();
        fd.append('id', id);
        await $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/tenant/detailtenant`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                let result = JSON.parse(data)
                console.log(result);
                $("#detail_tenant_uid").text(result.data._id);
                $("#detail_tenant_full_name").text(result.data.tenant_name);
                $("#detail_tenant_phonenumber").text(result.data.tenant_phone);
                $("#detail_tenant_type").text(result.data.tenant_type);
                $("#detail_tenant_address").text(result.data.tenant_address);
                $("#detail_tenant_sub_district").text(result.data.sub_district);
                $("#detail_tenant_province").text(result.data.province);
                $("#detail_tenant_city").text(result.data.city);
                $("#detail_tenant_postal_code").text(result.data.postal_code);
                $("#lat_vendor_exist").text(result.data.tenant_lat);
                $("#long_vendor_exist").text(result.data.tenant_long);

                // var latitude = result.data.tenant_lat
                // var longtitude = result.data.tenant_long
                // var address = result.data.tenant_address
                // var provinsis = result.data.province

                // var map = L.map('map', {
                //     // Set latitude and longitude of the map center (required)
                //     center: [latitude, longtitude],
                //     // Set the initial zoom level, values 0-18, where 0 is most zoomed-out (required)
                //     zoom: 11
                // });


                // // Create a Tile Layer and add it to the map
                // var tiles = new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                //     attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
                //     minZoom: '15'
                // }).addTo(map);

                // var marker = L.marker(
                //     [latitude, longtitude], {
                //         draggable: true,
                //         title: "",
                //         opacity: 0.75
                //     });

                // marker.addTo(map).bindPopup("<p1><b>" + provinsis + "</b><br>" + address + "</p1>").openPopup();
            }
        })
    }
</script>

<script>
    editTenant = async (id) => {
        $("#edittenant").modal('show');
        let fd = new FormData();
        fd.append('id', id);
        await $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/tenant/detailtenant`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                let result = JSON.parse(data)
                console.log(result);
                $("#edit_tenant_uid").val(result.data._id);
                $("#edit_tenant_full_name").val(result.data.tenant_name);
                $("#edit_tenant_phonenumber").val(result.data.tenant_phone);
                $("input[name=tenanttype][value=" + result.data.tenant_type + "]").prop('checked', true);
                $("#edit_tenant_address").val(result.data.tenant_address);
                $("#edit_tenant_sub_district").val(result.data.sub_district);
                $("#edit_tenant_code_sub_district").val(result.data.sub_district_id);
            }
        })
    }
    updateTenant = async () => {
        let fd = new FormData()
        let tenant_uid = $("#edit_tenant_uid").val();
        let tenant_name = $("#edit_tenant_full_name").val();
        let tenant_number = $("#edit_tenant_phonenumber").val();
        let tenant_type = $('input[name="tenanttype"]:checked').val();
        let tenant_address = $("#edit_tenant_address").val();
        let tenant_district = $("#edit_tenant_sub_district").val();
        let tenant_id_district = $("#edit_tenant_code_sub_district").val();
        console.log("type : " + tenant_type + ' ' + "nama : " + tenant_name);
        fd.append('tenantuid', tenant_uid)
        fd.append('tenantname', tenant_name)
        fd.append('tenantnumber', tenant_number)
        fd.append('tenanttype', tenant_type)
        fd.append('tenantaddress', tenant_address)
        fd.append('tenantdistrict', tenant_district)
        fd.append('tenantiddistrict', tenant_id_district)

        await $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/tenant/updatetenant`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                swal("Successfully", "Tenant Updated", "success");
                location.reload()
            }
        })
    }
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