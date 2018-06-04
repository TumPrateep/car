<script>
      var tire_modelId = $("#tire_modelId").val();
    var tire_brandId = $("#tire_brandId").val();

    $.post(base_url+"api/Tires/updatetiresmodel",{
        "tire_modelId": $("#tire_modelId").val()
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/Tires/updatetiresmodel/"+tire_brandId);
        }

        if(data.message == 200){
            result = data.data;
            $("#tire_modelName").val(result.tire_modelName);
     }
        
    });
    
    $("#submit").validate({
        rules: {
            modelName: {
            required: true
            },
            yearStart: {
            required: true
            } 
        },
        messages: {
            modelName: {
            required: "กรุณากรอกชื่อรุ่นรถ"
            },
            yearStart: {
            required: "กรุณากรอกปีที่เริ่ม"
            }
        },
    });


    $("#submit").submit(function(){
        updatetiresmodel();
    })


     function updatetiresmodel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/Tires/updatetiresmodel",data,
                function(data){
                    var tire_brandId = $("#tire_brandId").val();
                    if(data.message == 200){
                        showMessage(data.message,"admin/Tires/updatetiresmodel/"+brandId);
                    }else{
                    showMessage(data.message);
                    }
                });
                
            }
        }
    

    
</script>

</body>
</html>