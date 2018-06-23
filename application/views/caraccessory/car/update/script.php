<script>
        var brandId = $("#brandId").val();
    
        $.post(base_url+"api/car/getBrand",{
            "brandId": $("#brandId").val()
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"caraccessory/car/"+brandId);
            }
    
            if(data.message == 200){
                result = data.data;
                $("#brandName").val(result.brandName); 
            }
            
        });
        
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
    
    
        $("#submit").submit(function(){
            updateBrand();
        })

        function updateBrand(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                
                $.post(base_url+"apiCaraccessories/CarAccessory/getBrandforupdate",data,
                function(data){
                    
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/Car");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }
    
</script>

</body>
</html>