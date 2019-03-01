<script>
    $("#submit").validate({
        rules: {
            tire_front: {
                required: true
            },
            tire_back: {
                required: true
            },
            tire_rimId: {
                required: true
            }
        },
        messages: {
            tire_rimId: {
                required: "กรุณาเลือกขอบยาง"
            },
            tire_price: {
                required: "กรุณากรอกราคาขอบยาง"
            }
        },
    });

    $("#submit").submit(function(){
        createtirechange();
    })

    var tire_rim = $("#tire_rimId");

    getRim();

    function getRim(rimId = null){
        $.get(base_url+"api/Rim/getAllRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
            }
        );
    }

    function createtirechange(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiGarage/TireChangegarage/createtirechange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/charge/tire/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>