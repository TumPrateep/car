<script>
    $("#submit").validate({
        rules: {
            lubricator_gear_price: {
                required: true
            }
        },
        messages: {
            lubricator_gear_price: {
                required: "กรอกราคาค่าบริการ"
            }
        },
    });
    
    var lubricator_gear_changeId = $("#lubricator_gear_changeId").val();
    
    $("#submit").submit(function(){
        updatelubricatorChange();
        
    })


    function updatelubricatorChange(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorgearchange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/lubricatorgearcharge");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }

    $.get(base_url+"api/Lubricatorgearchange/getUpdate",{
        "lubricator_gear_changeId": lubricator_gear_changeId
    },function(data){
        var lubricatorChange = data.data;
        $("#lubricator_price").val(lubricatorChange.lubricator_price);
    });

    
</script>