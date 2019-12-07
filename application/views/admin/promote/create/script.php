<script>

    $("#submit").submit(function() {
        createteimg();
    })

    $.validator.addMethod('filesize', function(value, element, param) {
    return this.optional(element) || (element.files[0].size <= param)
}, 'ไฟล์ขนาดใหญ่กว่า {0}');

    $("#submit").validate({
        rules: {
            time: {
                required: true
            },
            tracking: {
                required: true,
                extension: "jpg|jpeg|png",
                filesize: 2000000
            }
        },
        messages: {
            time: {
                required: "กรอกวันที่-เวลาส่ง"
            },
            tracking: {
                required: "เลือกไฟล์",
                extension: "ประเภทไฟล์ไม่ถูกต้อง",
                filesize: "ไฟล์ขนาดใหญ่เกินไป"
            }
        },
    });

    function createteimg() {
        event.preventDefault();
        var isValid = $("#submit").valid();

        if (isValid) {
            // var imageData = $('.image-editor').cropit('export');
            // $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "api/promote/createpromote",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "admin/promote");
                    } else {
                        showMessage(data.message);
                    }
                    console.log(data);
                }
            });

        }

    }

</script>

</body>
</html>
