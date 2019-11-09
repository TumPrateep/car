<script>
    $("#submit").validate({
        rules: {
            price: {
                required: true
            }
        },
        messages: {
            price: {
                required: "กรุณากรอกราคาค่าขนส่งน้ำมันเครื่อง"
            }
        },
    });

    var lubricator_serviceId = $("#lubricator_serviceId").val();
    $("#submit").submit(function(){
        updatelubricatorservice();
    })

    function updateTireService(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorservice/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/lubricatorservice/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }

    $.post(base_url+"api/Lubricatorservice/getlubricatorservice",{
        "lubricator_serviceId": lubricator_serviceId
    },function(data){
        var lubricatorService = data.data;

        //  getRim(tireService.rimId);
        $("#price").val(lubricatorService.price);
    });

    // var tire_rim = $("#tire_rimId");

    // function getRim(rimId = null){
    //     $.get(base_url+"api/Rim/getAllRims",{},
    //         function(data){
    //             var tireData = data.data;
    //             $.each( tireData, function( key, value ) {
    //                 tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
    //             });
    //             tire_rim.val(rimId);
    //         }
    //     );
    // }
</script>