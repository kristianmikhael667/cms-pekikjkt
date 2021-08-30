<!-- Create User -->
<script>
    storeuser = () => {
        let fd = new FormData();
        let nama = $("#namalengkap").val();
        let noktp = $("#noktp").val();
        let gender = $('input[name="gender"]:checked').val();
        let email = $("#alamatemail").val();
        let nomorhp = $("#nomorhp").val();
        let password = $("#password").val();

        fd.append('nama', nama);
        fd.append('noktp', noktp);
        fd.append('gender', gender);
        fd.append('email', email);
        fd.append('nomor', nomorhp);
        fd.append('password', password);

        $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/users/postuser`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                swal("Successfully", "User Created", "success");
                location.href = `${baseUrl}/admin/users/list`;
            }
        })
    }
</script>

<!-- Detail User -->
<script>
    detailUser = async (id) => {

        $("#details").modal('show');

        let fd = new FormData();
        fd.append('id', id);
        await $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/users/detailuser`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                let result = JSON.parse(data)
                // console.log(result);
                $("#detail_user_image").attr('src', 'src', `${result.data.avatar_url}`);
                $("#detail_user_uid").text(result.data._id);
                $("#detail_user_full_name").text(result.data.name);
                $("#detail_user_email").text(result.data.email);
                $("#detail_user_phone_number").text(result.data.phone_number);
                $("#detail_user_identity_number").text(result.data.identity_number);
                $("#detail_user_gender").text(result.data.gender);
            }
        });
    }
</script>