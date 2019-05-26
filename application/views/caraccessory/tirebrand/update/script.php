<script>
        $("#submit").validate({
            rules: {
                brandName: {
                required: true
                },
            },
            messages: {
                brandName: {
                required: "กรุณากรอกชื่อยี่ห้อยาง"
                },
            }  
        });
        
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
            width: 200,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"tire_brand/"+tire_brandPicture
            }
        });
    }
    
    $("#submit").submit(function(){
        updateTireBrand();
    })

    function updateTireBrand(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/Tirebrand/updateTireBrand",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/tirebrand/index/"+tire_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>