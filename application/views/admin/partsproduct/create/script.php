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

    $("#submit").submit(function(){
        createBanks();
    })


    function createBanks(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/partsproduct/create",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/partsproduct");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>