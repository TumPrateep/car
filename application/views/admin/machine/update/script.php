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
    
var machineId= $("#machineId").val();

$.post(base_url+"api/Machine/getUpdate",{
    "machineId": machineId
},function(data){
    if(data.message!=200){
        showMessage(data.message,"admin/machine/");
    }

    if(data.message == 200){
        result = data.data;
        $("#machine_type").val(result.machine_type);
        
    }
    
});


$("#submit").submit(function(){
    updateMachine();
})

function updateMachine(){
    event.preventDefault();
    var isValid = $("#submit").valid();
    
    if(isValid){
        var data = $("#submit").serialize();
        
        $.post(base_url+"api/Machine/update",data,
        function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/machine/");
            }else{
                showMessage(data.message);
            }
        });
        
    }
}
</script>

</body>
</html>