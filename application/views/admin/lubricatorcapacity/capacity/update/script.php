<script>
    $("#submit").validate({
        rules: {
            lubricatorcapacity: {
                required: true
            }
        },
        messages: {
            lubricatorcapacity: {
                required: "กรุณากรอกความจุ"
            }
        },
    });


        var capacity_id = $("#capacity_id").val();

        $.post(base_url+"api/Lubricatorcapacity/getUpdate",{
            "capacity_id" : capacity_id
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/lubricatorcapacity");
            }

            if(data.message == 200){
                result = data.data;
                $("#lubricatorcapacity").val(result.capacity);
                // $("#accountNumber").val(result.accountNumber);
                // $("#fullName").val(result.fullName);

            }
            
        });
    

    
    $("#submit").submit(function(){
        updateCapacity();
        
    })


    function updateCapacity(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        var machineId = $('#machineId').val();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/lubricatorcapacity/updatecapacity",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorcapacity/capacity/"+machineId);
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
    
</script>