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
    
    // var lubricator_changeId = $("#lubricator_changeId").val();
    var limitId = $("#limitId").val();
    var groupId = $("#groupId").val();
    $("#submit").submit(function(){
        updatelubricatorChange();
        
    })


    function updatelubricatorChange(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/lubricatorgearlimit/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorgearlimit/lubricatorgearcharge/" + groupId);
                }else{
                    showMessage(data.message);
                }
            });
        }
    }

    $.get(base_url+"api/Lubricatorgearlimit/getLubricatorgearlimitChange",{
        "limitId": limitId
    },function(data){
        var lubricatorlimitchange = data.data;
        $("#price").val(lubricatorlimitchange.price);
    });

    
</script>