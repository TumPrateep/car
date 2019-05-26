<script>
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
        createLubricatorType();
    })

    function createLubricatorType(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/lubricatortype/createLubricatorType",data,
            function(data){
                var lubricator_typeId = $("#lubricator_typeId").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/lubricatortype");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>