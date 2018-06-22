<script>
 $("#submit").validate({
        rules: {
            tire_modelName: {
                required: true
            },
            
        },
        messages: {
            tire_modelName: {
                required: "กรุณากรอกรุ่นยาง"
            },
           
    });
    
    $("#submit").submit(function(){
        updateTireModel();
    })

    function updateTireModel(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiCaraccessories/Tiremodel/updateTireModel",data,
            function(data){
                var tire_modelName = $("#tire_modelName").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/TireModel/index1/"+value.tire_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>