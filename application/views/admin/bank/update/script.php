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


        var bankId = $("#bankId").val();

        $.get(base_url+"api/Bank/getUpdate",{
            "bankId" : bankId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/bank");
            }

            if(data.message == 200){
                result = data.data;
                $("#bankName").val(result.bankName);
                $("#accountNumber").val(result.accountNumber);
                $("#fullName").val(result.fullName);

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
            $.post(base_url+"api/Bank/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/bank");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
    // var lubricator_changeId = $("#lubricator_changeId").val();

    // $.get(base_url+"api/LubricatorChange/getUpdate",{
    //     "lubricator_changeId": lubricator_changeId
    // },function(data){
    //     var lubricatorChange = data.data;
    //     $("#lubricator_price").val(lubricatorChange.lubricator_price);
    // });

    
</script>