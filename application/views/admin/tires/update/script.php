<script>

    var rimId = $("#rimId").val();

    $.post(base_url+"api/Rim/getRim",{
        "rimId" : rimId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/Tires");
        }

        if(data.message == 200){
            result = data.data;
            $("#rimName").val(result.rimName);
        }
        
    });



    $("#submit").validate({
            rules: {
                rimName: {
                    required: true
                }
            },
            messages: {
                rimName: {
                    required: "กรุณากรอกขอบยาง"
                }
            }
    });

    $("#submit").submit(function(){
        updaterim();
    })


    function updaterim(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Rim/updaterim",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/SparePartCar/sparepart/"+spares_undercarriageId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
   
</script>

</body>
</html>