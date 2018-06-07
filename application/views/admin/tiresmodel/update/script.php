<script>
    $("#submit").validate({
        rules: {
            tire_modelName: {
            required: true
            },
        },  
        messages: {
            tire_modelName: {
            required: "กรุณากรอกชื่อรุ่นรถ"
            },
        }  
    });;


    var tire_brandId = $("#tire_brandId").val();
    var tire_modelId = $("#tire_modelId").val();

    $.post(base_url+"api/Triemodel/getireById",{
        "tire_brandId": tire_brandId,
        "tire_modelId" : tire_modelId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/Tires/tiresmodel/"+tire_brandId+"/"+tire_modelId);
        }else{
            result = data.data;
            $("#tire_modelName").val(result.tire_modelName);
        }
        
    });

    
    $("#submit").submit(function(){
        updatetiresmodel();
    })


    function updatetiresmodel(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Triemodel/updateTireModel",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Tires/tiresmodel/"+tire_brandId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

    
</script>

</body>
</html>