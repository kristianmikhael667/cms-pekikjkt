<script>
    storebanner = () => {
        let fd = new FormData();
        let title = $("#titlebanner").val();
        let media_type = $("#mediatype").val();
        let description = $('textarea#descriptionbanner').val();
        let media_banner = $("#mediabanner")[0].files[0];
        let launch_url = $("#launchurl").val();
        let is_internal = $("#isinternallaunch").val();

        // console.log(
        //     "titlebanner : " + title + " " +
        //     "mediatype : " + media_type + " " +
        //     "descriptionbanner : " + description + " " +
        //     "mediabanner : " + media_banner + " " +
        //     "launchurl : " + launch_url + " " +
        //     "isinternallaunch : " + is_internal
        // );

        fd.append('title', title);
        fd.append('media_type', media_type);
        fd.append('desc', description);
        fd.append('media_url', media_banner);
        console.log(media_banner);
        fd.append('launch_url', launch_url);
        fd.append('is_internal_launch', is_internal);

        $.ajax({
            type: "POST",
            url: `${baseUrl}/admin/banner/postbanner`,
            cache: false,
            contentType: false,
            processData: false,
            data: fd,
            success: function(data) {
                swal("Successfully", "Banner Created", "success");
                location.href = `${baseUrl}/admin/banner/listbanner`;
            }
        })
    }
</script>