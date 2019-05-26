<script>
 $("#submit").validate({
        rules: {
            tire_size: {
                required: true
            },
            tire_series: {
                required: true
            },
            rim: {
                required: true
            }
        },
        messages: {
            tire_size: {
                required: "กรุณากรอกขนาดยาง"
            },
            tire_series: {
                required: "กรุณากรอกซีรี่ย์ยาง"
            },
            rim: {
                required: "กรุณากรอกขนาดกะทะล้อ"
            }
        },
    });
    
    $("#submit").submit(function(){
        createTireModel();
    })

    function createTireModel(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/Tiremodel/createTireModel",data,
            function(data){
                var tire_modelName = $("#tire_modelName").val();
                var tire_brandId = $("#tire_brandId").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/tiremodel/index/"+tire_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>