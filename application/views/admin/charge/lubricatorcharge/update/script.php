<script>
    $("#submit").validate({
        rules: {
            lubricator_price: {
                required: true
            }
        },
        messages: {
            lubricator_price: {
                required: "กรอกราคาค่าบริการ"
            }
        },
    });
    
    var lubricator_changeId = $("#lubricator_changeId").val();
    
    $("#submit").submit(function(){
        updatelubricatorChange();
        
    })


    function updatelubricatorChange(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/LubricatorChange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Charge/LubricatorCharge");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }

    $.get(base_url+"api/LubricatorChange/getUpdate",{
        "lubricator_changeId": lubricator_changeId
    },function(data){
        var lubricatorChange = data.data;
        $("#lubricator_price").val(lubricatorChange.lubricator_price);
    });

    
</script>