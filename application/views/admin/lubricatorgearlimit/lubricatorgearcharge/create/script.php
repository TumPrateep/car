<script>
    $("#submit").validate({
        rules: {
            lubricator_gear_price: {
                required: true
            },
            groupId:{
                require : true
            }
        },
        messages: {
            lubricator_gear_price: {
                required: "กรอกราคาค่าบริการ"
            }
        },
    });

    $("#submit").submit(function(){
        createlubricatorgearchange();
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

    function createlubricatorgearchange(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        var groupId = $("#groupId").val();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/lubricatorgearlimit/createlubricatorgearchange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorgearlimit/lubricatorgearcharge/"+groupId);
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>