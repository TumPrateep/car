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
            tire_front: {
                required: "กรุณากรอกราคายางล้อหน้า"
            },
            tire_back: {
                required: "กรุณากรอกราคายางล้อหลัง"
            },
            tire_rimId: {
                required: "กรุณาเลือกขอบยาง"
            }
        },
    });

    $("#submit").submit(function(){
        createtirechange();
    })

    var tire_rim = $("#tire_rimId");
    var groupId = $("#groupId").val();
    init();

    function init(){
        getRim();
    }

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
            $.post(base_url+"api/tirelimit/createtirechange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/tirelimit/tiresizecharge/"+groupId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>