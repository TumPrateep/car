<script>
    $("#submit").validate({
        rules: {
            lubricatorcarpacity: {
                required: true
            }
        },
        messages: {
            lubricatorcarpacity: {
                required: "กรุณากรอกความจุ"
            }
        },
    });


        var capacity_id = $("#capacity_id").val();

        $.post(base_url+"api/Lubricatorcarpacity/getUpdate",{
            "capacity_id" : capacity_id
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/lubricatorcarpacity");
            }

            if(data.message == 200){
                result = data.data;
                $("#lubricatorcarpacity").val(result.capacity);
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
            $.post(base_url+"api/lubricatorcarpacity/updatecapacity",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorcarpacity/carpacity/"+machineId);
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
    
</script>