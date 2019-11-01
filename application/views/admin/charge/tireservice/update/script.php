<script>
    $("#submit").validate({
        rules: {
            price: {
                required: true
            },
            tire_rimId: {
                required: true
            }
        },
        messages: {
            price: {
                required: "กรุณากรอกราคาค่าขนส่งยาง"
            },
            tire_rimId: {
                required: "กรุณาเลือกขอบยาง"
            }
        },
    });

    var tire_serviceId = $("#tire_serviceId").val();
    $("#submit").submit(function(){
        updateTireService();
    })

    function updateTireService(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Tireservice/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/tireservice/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }

    $.post(base_url+"api/Tireservice/gettireservice",{
        "tire_serviceId": tire_serviceId
    },function(data){
        var tireService = data.data;

        getRim(tireService.rimId);
        $("#price").val(tireService.price);
    });

    var tire_rim = $("#tire_rimId");

    function getRim(rimId = null){
        $.get(base_url+"api/Rim/getAllRims",{},
            function(data){
                var tireData = data.data;
                $.each( tireData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
                tire_rim.val(rimId);
            }
        );
    }
</script>