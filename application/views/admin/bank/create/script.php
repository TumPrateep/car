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

    $("#submit").submit(function(){
        createBanks();
    })


    function createBanks(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Bank/createBanks",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/bank");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>