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
    
    $("#submit").submit(function(){
        modelofcar_create();
    })


    function modelofcar_create(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/modelofcar/create",data,
            function(data){
                var modelofcarName = $("#modelofcarName").val();
                var modelId = $("#modelId").val();
                var brandId = $("#brandId").val();
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
