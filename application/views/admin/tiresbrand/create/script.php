<script>
      $("#create-tiresbrand").validate({
        rules: {
            tiresbrandName: {
                required: true
            },
            tiresbrandPicture: {
                
            }
        },
        messages: {
            tiresbrandName: {
                required: "กรุณากรอกยี่ห้อยางรถยนตร์ "
            },
            tiresbrandPicture: {
                required: "กรุณาใส่รูปยี่ห้อยางรถยนตร์",
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
                
        
          
        
});

    $("#create-tiresbrand").submit(function(){
        createtiresbrand();
    });

    function createtiresbrand(){
        event.preventDefault();
        var isValid = $("#create-tiresbrand").valid();
        if(isValid){
            var myform = document.getirebrandById("create-tiresbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/tires/createtiresbrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/tires");
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