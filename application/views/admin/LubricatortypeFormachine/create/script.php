<script>
 $("#submit").validate({
        rules: {
            lubricatortypeFormachine: {
                required: true
            }
        },
        messages: {
            lubricatortypeFormachine: {
                required: "กรุณากรอกประเภทน้ำมันเครื่อง"
            }   
        },
    });
    
    $("#submit").submit(function(){
        createLubricatortypeFormachine();
    })

    function createLubricatortypeFormachine(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatortypeformachine/createlubricatortypeFormachines",data,
            function(data){
                var lubricatortypeFormachineId = $("#lubricatortypeFormachineId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatortypeformachine/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>