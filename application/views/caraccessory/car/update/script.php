<script>
        $("#submit").validate({
            rules: {
                brandName: {
                    required: true
                },
            },
            messages: {
                brandName: {
                    required: "กรุณากรอกชื่อยี่ห้อรถ"
                },
            }
        });

        
        var brandId = $("#brandId").val();
    
        $.post(base_url+"api/car/getBrand",{
            "brandId": $("#brandId").val()
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"caraccessory/car/");
            }
    
            if(data.message == 200){
                result = data.data;
                $("#brandName").val(result.brandName); 
                setBrandPicture(result.brandPicture);
            }
            
        });
        function setBrandPicture(brandPicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"brand/"+brandPicture
            }
        });
    }
    
        $("#submit").submit(function(){
            updateBrand();
        })

        function updateBrand(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var data = $("#submit").serialize();
                
                $.post(base_url+"apicaraccessories/caraccessory/updateBrand",data,
                function(data){
                    
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/car");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }
    
</script>

</body>
</html>