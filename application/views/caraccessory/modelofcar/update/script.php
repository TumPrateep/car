<script>

    $("#submit").validate({
        rules: {
            modelofcarName: {
                required: true
            },
        },
        messages: {
            modelofcarName: {
                required: "กรุณากรอกชื่อของรุ่นรถ"
            }
        },
    });
    var modelofcarId = $("#modelofcarId").val();
    var brandId = $("#brandId").val();
    var modelId = $("#modelId").val();
    var modelofcarName = $("#modelofcarName").val();
    $.post(base_url+"apicaraccessories/modelofcar/getallmodelofcar",{
        "modelofcarId": modelofcarId,
        "modelId" : modelId,
        "brandId" : brandId,
    },function(data){
            if(data.message!=200){
                showMessage(data.message,"caraccessory/modelofcar/index/"+brandId+'/'+modelId);
            }
             if(data.message == 200){
                result = data.data;
                $("#modelofcarName").val(result.modelofcarName);
            }
        
    });
    
    $("#submit").submit(function(){
        modelofcar_update();
    })


    function modelofcar_update(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/modelofcar/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/modelofcar/index/"+brandId+'/'+modelId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
