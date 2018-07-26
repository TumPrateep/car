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
        modelofcar_update();
    })


    function modelofcar_update(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiCaraccessories/Modelofcar/update",data,
            function(data){
                var modelofcarName = $("#modelofcarName").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/Modelofcar/index/$brandId/$modelId");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
