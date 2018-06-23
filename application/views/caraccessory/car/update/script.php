<script>
        var brandId = $("#brandId").val();
    
        $.post(base_url+"api/car/getbrand",{
            "brandId": $("#brandId").val()
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/car/brand/"+brandId);
            }
    
            if(data.message == 200){
                result = data.data;
                $("#tire_brandName").val(result.tire_brandName);
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
            },
        });
    
    
        $("#submit").submit(function(){
            updatebrand();
        })

        function updatebrand(){
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