<script>

var rimId = $("#rimId").val();

    $.post(base_url+"api/Rim/getRim",{
        "rimId" : rimId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/tires");
        }

        if(data.message == 200){
            result = data.data;
            $("#rimName").val(result.rimName);
        }
        
    });
$("#submit").validate({
        rules: {
            rimName: {
                required: true
            }
          
        },
        messages: {
            rimName: {
                required: "กรุณากรอกขอบยาง"
            }
        },
    });

        $("#submit").submit(function(){
        updateTireRim();
    })

    function updateTireRim(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/Tirerim/updaterim",data,
            function(data){
                var rimId = $("#rimId").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/tirerim/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>