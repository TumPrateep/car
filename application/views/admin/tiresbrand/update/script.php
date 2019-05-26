<script>

    var tire_brandId = $("#tire_brandId").val();
    var picture = "";

    $.post(base_url+"api/Triebrand/getTireBrandforupdate",{
        "tire_brandId": tire_brandId,
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/tires/tiresbrand/");
        }

        if(data.message == 200){
            result = data.data;
            $("#tire_brandName").val(result.tire_brandName);
            setTireBrandPicture(result.tire_brandPicture);
        }
        
    });      
    function setTireBrandPicture(tire_brandPicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 414,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"tire_brand/"+tire_brandPicture
            }
        });
    }

             

    $("#update-tiresbrand").validate({
        rules: {
            tire_brandName: {
                required: true
            }
        },
        messages: {
            tire_brandName: {
                required: "กรุณากรอกยี่ห้อยางรถยนต"
            }
        },
    });

    $("#update-tiresbrand").submit(function(){
        updateTireBrand();
    })
    function updateTireBrand(){
        event.preventDefault();
        var isValid = $("#update-tiresbrand").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-tiresbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Triebrand/updateTireBrand",
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