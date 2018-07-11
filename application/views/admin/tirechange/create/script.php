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
            $.post(base_url+"api/tirechange/createtirechange",data,
            function(data){
                var rimId = $("#rimId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/Tires/tirechange/"+rimId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>