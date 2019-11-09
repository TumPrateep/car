<script>
    $("#submit").validate({
        rules: {
            price: {
                required: true
            }
        },
        messages: {
            price: {
                required: "กรุณากรอกราคาค่าขนส่งน้ำมันเครื่อง"
            }
        },
    });

    $("#submit").submit(function(){
        createlubricatorservice();
    })

    function createlubricatorservice(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorservice/create",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/lubricatorservice/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>