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
    var tire_changeId = $("#tire_changeId").val();
    $("#submit").submit(function(){
        updatetireChang();
    })


    function updatetireChang(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/TireChange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/tires/tirechange");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
</script>