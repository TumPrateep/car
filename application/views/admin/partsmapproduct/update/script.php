<script>
    $("#submit").validate({
        rules: {
            partsName: {
                required: true
            }
        },
        messages: {
            partsName: {
                required: "กรอกรายการสินค้า"
            }
        },
    });


    var partId = $("#partId").val();

    $.get(base_url+"api/partsproduct/getUpdate",{
        "partId" : partId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/partsproduct");
        }

        if(data.message == 200){
            result = data.data;
            $("#partsName").val(result.partsName);
        }
        
    });
    
    $("#submit").submit(function(){
        updateBanks();
    })


    function updateBanks(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/partsproduct/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/partsproduct");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
    
</script>