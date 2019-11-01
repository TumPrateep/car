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

    $("#submit").submit(function(){
        createtireservice();
    })

    var tire_rim = $("#tire_rimId");

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

    function createtireservice(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Tireservice/create",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/tireservice/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>