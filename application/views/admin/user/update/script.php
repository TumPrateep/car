<script>
     $("#group").validate({
        rules: {
            username: {
                required: true
            },
            phone: {
                required: true
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
                required: "กรุณากรอกเบอร์โทรศัพท์"
            },
            email: {
                email: "กรุณากรอกอีเมลให้ถูกต้อง"
            } 
        },
    });



    var id = $("#id").val();

    $.post(base_url+"api/UserManagement/getuser",{
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
        
        if(isValid){
            // var data = $("#group").serialize();
            // $.post(base_url+"api/UserManagement/create",data,
            // function(data){
            //     var username = $("#username").val();
            //     showMessage(data.message,"admin/usermanagement");
            // });
            
        }
    }


</script>

</body>
</html>