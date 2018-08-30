<!-- <script>
var lubricatortypeFormachineId= $("#lubricatortypeFormachineId").val();

$.post(base_url+"api/Lubricatortypeformachine/getAllLubricatortypeformachine",{
    "lubricatortypeFormachineId": $("#lubricatortypeFormachineId").val()
},function(data){
    if(data.message!=200){
        showMessage(data.message,"admin/car/model/"+brandId);
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
        $.post(base_url+"api/Lubricatortypeformachine/update",data,
        function(data){
            if(data.message == 200){
                showMessage(data.message,"admin/Tires/tiresize/"+rimId);
            }else{
                showMessage(data.message);
            }
        });
        
    }
}
</script> -->
