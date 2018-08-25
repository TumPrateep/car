<script>
    $(document).ready(function(){

        $("#group").submit(function(){
            createUser();
        })    

        $("#group").validate({
            rules: {
                username: {
                    required: true
                },
                phoneNumber: {
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
                phoneNumber: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    minlength: "กรุณากรอกเบอร์โทรศัพท์อย่างน้อย 9ตัว"
                },
                email: {
                    email: "กรุณากรอกอีเมลให้ถูกต้อง"
                }
            },
        });

        
        function createUser(){
            event.preventDefault();
            var isValid = $("#group").valid();
            
            if(isValid){
                var data = $("#group").serialize();
                $.post(base_url+"api/UserManagement/create",data,
                function(data){
                    if(data.message == 200){
                        var username = $("#username").val();
                        showMessage(data.message,"admin/UserManagement");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }
    });

</script>

</body>
</html>
