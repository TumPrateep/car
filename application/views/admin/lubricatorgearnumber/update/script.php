<script>
    var lubricator_numberId = $("#lubricator_numberId").val();
    var lubricatorNumber = $("#lubricator_number");

    $.post(base_url+"api/lubricatorgearnumber/getLubricatorNumber",{
        "lubricator_numberId": lubricator_numberId,
        
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/lubricatorgearnumber");
        }

        if(data.message == 200){
            result = data.data;
            $("#lubricator_gear_number").val(result.number);
            if(result.typeId == 1){
                $("#lubricator_gear").val(result.typeId);
            }else{
                $("#lubricator_gear").val(result.typeId);
            }
        }
        
    });

    $("#update-lubricatornumber").validate({
        rules: {
            lubricator_gear_number: {
                required: true
            },
            lubricator_typeId: {
                hasGear: true
            },
        },
        messages: {
            lubricator_gear_number: {
                required: "กรุณากรอกเบอร์น้ำมันเกียร์"
            },
        },
    });

    $("#update-lubricatornumber").submit(function(){
        updateLubricatorNumber();
    });

    function updateLubricatorNumber(){
        event.preventDefault();
        var isValid = $("#update-lubricatornumber").valid();
        if(isValid){
            var data = $("#update-lubricatornumber").serialize();
            $.post(base_url+"api/lubricatorgearnumber/updatelubricatorgearnumber",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorgearnumber");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>

</body>
</html>