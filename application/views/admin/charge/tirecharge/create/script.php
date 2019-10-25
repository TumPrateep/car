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
    var unit_id = $("#unit_id");
    init();

    function init(){
        getRim();
        getunit();
    }

    function getunit(){
        unit_id.html('<option value="">เลือกหน่วย</option>');
        $.get(base_url+"api/tirechangessize/getAllunit",{},
            function(data){
                var unitData = data.data;
                $.each( unitData, function( key, value ) {
                    unit_id.append('<option value="' + value.unit_id + '">' + value.unit + ' </option>');
                });
            } 
        );
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
            $.post(base_url+"api/Tirechange/createtirechange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/tirescharge/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>