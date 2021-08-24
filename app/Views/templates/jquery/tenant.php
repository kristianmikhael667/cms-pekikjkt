<!-- <script>
    $(document).ready(function() {
        $('#create_province').on('change', function() {
            var category_id = this.value;
            console.log(category_id);
            if (category_id) {
                $.ajax({
                    url: "https://api.rajaongkir.com/starter/city?province=" + category_id,
                    type: "GET",
                    crossDomain: true,
                    dataType: 'jsonp',

                    beforeSend: function(xhr) {
                        xhr.setRequestHeader("key", "83e9f659114c8574f2f0b53cabfa2102");
                        xhr.setRequestHeader("Access-Control-Allow-Origin", "*");
                        xhr.setRequestHeader("Content-Type", "application/json");
                    },
                    data: {
                        category_id: category_id,
                    },
                    // data: JSON.stringify({
                    //     category_id: category_id,
                    // }),
                    success: function(data) {
                        console.log(data);

                        $('select[name="create_city"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="create_city"]').append('<option value="' + key + '">' + value + '</option>');
                        });
                    }
                })
            }
        });
    });
</script> -->
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
                        html += '<option data-code="' + jayson.rajaongkir.results[i].postal_code + '" value=' + jayson.rajaongkir.results[i].city_id + '>' + jayson.rajaongkir.results[i].city_name + '</option>';
                    }


                    $('#create_city').html(html);
                }
            });
            return false;
        });

    });
    $("#create_city").change(function() {
        var code = $(this).find(':selected').data('code');
        $('#postalcode').val(code);

    });
</script>

<script>
    var map = L.map('map').setView([51.505, -0.09], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([51.5, -0.09]).addTo(map)
        .bindPopup('A pretty CSS3 popup.<br> Easily customizable.')
        .openPopup();
</script>