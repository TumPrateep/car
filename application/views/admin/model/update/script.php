<script>

    var modelId = $("#modelId").val();
    var brandId = $("#brandId").val();

    $.post(base_url+"api/car/getModel",{
        "modelId": $("#modelId").val()
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"car/model/"+brandId+"/"+modelId);
        }

        if(data.message == 200){
            result = data.data;
            $("#modelName").val(result.modelName);
            $("#yearStart").val(result.yearStart);
            $("#yearEnd").val(result.yearEnd);
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
        updateModel();
    })


    function updateModel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/car/updateModel",data,
                function(data){
                    var brandId = $("#brandId").val();
                    if(data.message == 200){
                        showMessage(data.message,"car/model/"+brandId);
                    }else{
                    showMessage(data.message);
                    }
                });
                
            }
        }

</script>

</body>
</html>