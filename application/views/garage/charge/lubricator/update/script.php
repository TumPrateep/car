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
    
    var lubricator_change_garageId = $("#lubricator_change_garageId").val();
    
    $("#submit").submit(function(){
        updatelubricatorChangegarage();
        
    })


    function updatelubricatorChangegarage(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            // งง v
            $.post(base_url+"api/LubricatorChange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/Charge/lubricator");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
        // งง v
    $.get(base_url+"api/LubricatorChange/getUpdate",{
        "lubricator_change_garageId": lubricator_change_garageId
    },function(data){
        // งง v
        var lubricatorChange = data.data;  
        $("#lubricator_price").val(lubricatorChange.lubricator_price);
    });

    
</script>