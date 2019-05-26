<script>
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
            rimId: {
                required: "กรุณากรอกขอบยาง"
            },
            tire_back: {
                required: "กรุณากรอกราคาขอบยาง",
                min: "กรุณากรอกราคาเต็มจำนวน"
            }
        },
    });
    var tire_changeId = $("#tire_changeId").val();
    $("#submit").submit(function(){
        updatetireChang();
    })


    function updatetireChang(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apigarage/Tirechangegarage/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/charge/tire");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }

    $.get(base_url+"apigarage/Tirechangegarage/getTireChange",{
        "tire_changeId": tire_changeId
    },function(data){
        var tireChange = data.data;
        getRim(tireChange.rimId);
        $("#tire_price").val(tireChange.tire_price);
    });

    var tire_rim = $("#tire_rimId");

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
</script>