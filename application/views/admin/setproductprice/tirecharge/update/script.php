<script>

$(document).ready(function () {
    $("#submit").validate({
        rules: {
            tire_front: {
                required: true
            },
            tire_back: {
                required: true
            },
            rimId: {
                required: true
            }
        },
        messages: {
            tire_front: {
                required: "กรุณากรอกราคายางล้อหน้า"
            },
            tire_back: {
                required: "กรุณากรอกราคายางล้อหลัง"
            },
            rimId: {
                required: "กรุณากรอกขอบยาง"
            }
        },
    });
    var limitId = $("#limitId").val();
    var rimId = $("#rimId").val();
    var groupId = $("#groupId").val();
    $("#submit").submit(function(){
        updatetireChang();
    })


    function updatetireChang(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/tirelimit/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/tirelimit/tiresizecharge/"+groupId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }

    $.get(base_url+"api/tirelimit/getTireChange",{
        "limitId": limitId
    },function(data){
        var tireChange = data.data;
        getRim(tireChange.rimId);
        $("#tire_price").val(tireChange.price);
    });

    var tire_rim = $("#tire_rimId");
    // var unitN = $("#unit_id");

    function getRim(rimId = null){
        $.get(base_url+"api/Rim/getAllRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
                tire_rim.val(rimId);
            }
        );
    }
});
    
</script>