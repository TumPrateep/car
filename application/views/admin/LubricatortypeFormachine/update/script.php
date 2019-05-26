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
    
var lubricatortypeFormachineId= $("#lubricatortypeFormachineId").val();

$.post(base_url+"api/Lubricatortypeformachine/getUpdate",{
    "lubricatortypeFormachineId": $("#lubricatortypeFormachineId").val()
},function(data){
    if(data.message!=200){
        showMessage(data.message,"admin/lubricatortypeformachine/");
    }

    if(data.message == 200){
        result = data.data;
        $("#lubricatortypeFormachine").val(result.lubricatortypeFormachine);
        
    }
    
});


$("#submit").submit(function(){
    updatelubricatortypeFormachine();
})

function updatelubricatortypeFormachine(){
    event.preventDefault();
    var isValid = $("#submit").valid();
    
    if(isValid){
        var data = $("#submit").serialize();
        
        $.post(base_url+"api/Lubricatortypeformachine/updateLubricatortypeformachine",data,
        function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/lubricatortypeformachine/");
            }else{
                showMessage(data.message);
            }
        });
        
    }
}
</script>

</body>
</html>