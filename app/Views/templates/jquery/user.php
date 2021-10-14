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

<script>
    editUser = async (id) => {
        $("#edituser").modal('show');
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
                $("#edit_user_uid").val(result.data._id);
                $("#edit_user_full_name").val(result.data.name);
                $("#edit_user_phonenumber").val(result.data.phone_number);
                $("input[name=roletype][value=" + result.data.role + "]").prop('checked', true);
                $("input[name=gendertype][value=" + result.data.gender + "]").prop('checked', true);
                $("#edit_user_email").val(result.data.email);
                $("#edit_user_identity_number").val(result.data.identity_number);
            }
        })
    }
    updateUser = async () => {
        let fd = new FormData()
        let user_uid = $("#edit_user_uid").val();
        let user_fullname = $("#edit_user_full_name").val();
        let user_phonenumber = $("#edit_user_phonenumber").val();
        let user_roletype = $('input[name="roletype"]:checked').val();
        let user_gendertype = $('input[name="gendertype"]:checked').val();
        let user_email = $("#edit_user_email").val();
        let user_identity_number = $("#edit_user_identity_number").val();
        // console.log("uid : " + user_uid + ' ' + "nama : " + user_fullname + ' ' + "phone : " + user_phonenumber + ' ' + "role : " + user_roletype + ' ' + 'gender : ' + user_gendertype + 'email : ' + user_email + 'iden : ' + user_identity_number);
        fd.append('useruid', user_uid)
        fd.append('userfullname', user_fullname)
        fd.append('userphonenumber', user_phonenumber)
        fd.append('userrole', user_roletype)
        fd.append('usergender', user_gendertype)
        fd.append('useremail', user_email)
        fd.append('useridentitynumber', user_identity_number)

        await $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/users/updateuser`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                swal("Successfully", "User Updated", "success");
                location.reload()
            }
        })
    }
</script>