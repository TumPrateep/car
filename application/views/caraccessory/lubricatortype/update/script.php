<script>
     var lubricator_typeId = $("#lubricator_typeId").val();
    $.post(base_url+"api/LubricatorType/getLubricatorType",{
        "lubricator_typeId": lubricator_typeId,
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"caraccessory/Lubricatortype");
        }else{
            result = data.data;
            $("#lubricator_typeName").val(result.lubricator_typeName);
            $("#lubricator_typeSize").val(result.lubricator_typeSize);


        }
        
    });
 $("#submit").validate({
        rules: {
            lubricator_typeName: {
                required: true
            },
            lubricator_typeSize: {
                required: true
            }
        },
        messages: {
            lubricator_typeName: {
                required: "กรุณากรอกชื่อประเภทน้ำมันเครื่อง"
            },
            lubricator_typeSize: {
                required: "กรุณากรอกจำนวนระยะทาง"
            }
        },
    });
    
    $("#submit").submit(function(){
        updateLubricatorType();
    })

    function updateLubricatorType(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiCaraccessories/LubricatorType/updateLubricatorType",data,
            function(data){
                var lubricator_typeId = $("#lubricator_typeId").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/Lubricatortype");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
    
   
</script>

</body>
</html>