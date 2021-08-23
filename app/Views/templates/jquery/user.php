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