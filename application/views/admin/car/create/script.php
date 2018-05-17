<script>
      $("#create-brand").validate({
        rules: {
            brandName: {
                required: true
            },
            brandPicture: {
                required: true,
                extension: "jpg|jpeg"
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
                        showMessage(data.message,"car");
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