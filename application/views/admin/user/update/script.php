<script>
     $("#group").validate({
        rules: {
            username: {
                required: true
            },
            phone: {
                required: true,
                minlength:9
            },
            email: {
                email: true
            } 
        },
        messages: {
            username: {
                required: "กรุณากรอกชื่อผู้ใช้งาน"
            },
            phone: {
                required: "กรุณากรอกเบอร์โทรศัพท์",
                minlength:"กรุณากรอกเบอร์โทรศัพท์อย่างน้อย 9 ตัว"
            },
            email: {
                email: "กรุณากรอกอีเมลให้ถูกต้อง"
            } 
        },
    });



    var id = $("#id").val();

    $.post(base_url+"api/Usermanagement/getuser",{
        "id": id
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/usermanagement");
        }

        if(data.message == 200){
            result = data.data;
            $("#username").val(result.username);
            $("#phone").val(result.phone);
            $("#email").val(result.email);
        }
        
    });

    $("#group").submit(function(){
        updateUser();
    })

    function updateUser(){
        event.preventDefault();
        var isValid = $("#group").valid();
        var data = $("#group").serialize();
        if(isValid){
            var data = $("#group").serialize();
            $.post(base_url+"api/Usermanagement/updateUser",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/usermanagement");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }


</script>

</body>
</html>