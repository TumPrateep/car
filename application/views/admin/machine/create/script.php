<script>
 $("#submit").validate({
        rules: {
            machine_type: {
                required: true
            }
        },
        messages: {
            machine_type: {
                required: "กรุณากรอกประเภทเครื่องยนต์"
            }   
        },
    });
    
    $("#submit").submit(function(){
        createMachine();
    })

    function createMachine(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Machine/create",data,
            function(data){
                // var lubricatortypeFormachineId = $("#lubricatortypeFormachineId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/machine/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>