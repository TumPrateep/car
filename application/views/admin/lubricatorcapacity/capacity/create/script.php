<script>
    $("#submit").validate({
        rules: {
            lubricatorcapacity: {
                required: true
            },
        },
        messages: {
            lubricatorcapacity: {
                required: "กรุณากรอกความจุ"
            }
        },
    });
    
    $("#submit").submit(function(){
        capacity();
    })


    function capacity(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        var machineId = $('#machineId').val();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorcapacity/createcarpacity",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorcapacity/capacity/"+machineId);//capacity/"+data.machineId 
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
