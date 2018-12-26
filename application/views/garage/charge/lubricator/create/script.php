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
        createlubricatorchangegarage();
    })

    // var tire_rim = $("#tire_rimId");

    // getRim();

    // function getRim(rimId = null){
    //     $.get(base_url+"api/Rim/getAllRims",{},
    //         function(data){
    //             var brandData = data.data;
    //             $.each( brandData, function( key, value ) {
    //                 tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
    //             });
    //         }
    //     );
    // }

    function createlubricatorchangegarage(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiGarage/Lubricatorchange/createLubricatorchangegarage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/Charge/lubricator");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>