<script>
      $("#create-tiresbrand").validate({
        rules: {
            tire_brandName: {
                required: true
            },
            tire_brandPicture: {
                
            }
        },
        messages: {
            tire_brandName: {
                required: "กรุณากรอกยี่ห้อยางรถยนตร์ "
            },
            tire_brandPicture: {
                required: "กรุณาใส่รูปยี่ห้อยางรถยนตร์",
                extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            }
        },
    });

    $("#tire_brandPicture").fileinput({
        language: "th",
        theme: 'fa',
        allowedFileExtensions: ['jpg'],
        overwriteInitial: false,
        maxFileSize: 300,
        required: true,
        showCancel: false,
        showUpload: false,
                
        
          
        
});

    $("#create-tiresbrand").submit(function(){
        createBrand();
    });

    function createBrand(){
        event.preventDefault();
        var isValid = $("#create-tiresbrand").valid();
        if(isValid){
            var myform = document.getElementById("create-tiresbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Triebrand/createBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/tires/tiresbrand");
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