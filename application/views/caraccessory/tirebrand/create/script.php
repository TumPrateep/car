<script>
      $("#submit").validate({
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

//     $("#tire_brandPicture").fileinput({
//         language: "th",
//         theme: 'fa',
//         allowedFileExtensions: ['jpg' , 'png'],
//         overwriteInitial: false,
//         maxFileSize: 300,
//         required: true,
//         showCancel: false,
//         showUpload: false,
                
        
          
        
// });

    $("#submit").submit(function(){
        createBrand();
    });

    function createBrand(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/Tirebrand/createBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/TireBrand");
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