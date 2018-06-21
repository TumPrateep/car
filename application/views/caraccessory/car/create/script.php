<script>
    $("#submit").validate({
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

     $("#submit").submit(function(){
        brandName();
    })


    function brandName(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/CarAccessory/createBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/car");
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