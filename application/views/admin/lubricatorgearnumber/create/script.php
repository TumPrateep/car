<script>
    $("#create-lubricatornumber").validate({
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

    $("#create-lubricatornumber").submit(function(){
        createlubricatornumber();
    });

    function createlubricatornumber(){
        event.preventDefault();
        var isValid = $("#create-lubricatornumber").valid();
        
        if(isValid){
            var data = $("#create-lubricatornumber").serialize();
            $.post(base_url+"api/lubricatorgearnumber/createlubricatorgearnumber",data,
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