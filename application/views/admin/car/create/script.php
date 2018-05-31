<script>
      $("#create-brand").validate({
        rules: {
            brandName: {
                required: true
            },
            brandPicture: {
                
            }
        },
        messages: {
            brandName: {
                required: "กรุณากรอกยี่ห้อรถ"
            },
            brandPicture: {
                required: "กรุณาใส่รูปยี่ห้อรถ",
                extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            }
        },
    });

    $("#brandPicture").fileinput({
        language: "th",
        theme: 'fa',
        allowedFileExtensions: ['jpg'],
        overwriteInitial: false,
        maxFileSize: 300,
        required: true,
        showCancel: false,
        showUpload: false,
                
        
        // MaxFileHeight :300,
        // MaxFileWidth : 300

        
        
});

    $("#create-brand").submit(function(){
        createBrand();
    });

    function createBrand(){
        event.preventDefault();
        var isValid = $("#create-brand").valid();
        if(isValid){
            var myform = document.getElementById("create-brand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/car/createBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/car");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
</script>

</body>
</html>