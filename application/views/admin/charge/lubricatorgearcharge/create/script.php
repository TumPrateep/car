<script>
    $("#submit").validate({
        rules: {
            lubricator_gear_price: {
                required: true
            }
        },
        messages: {
            lubricator_gear_price: {
                required: "กรอกราคาค่าบริการ"
            }
        },
    });

    $("#submit").submit(function(){
        createlubricatorchange();
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

    function createlubricatorchange(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorgearchange/createlubricatorgearchange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/lubricatorgearcharge");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>