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
                            required: true
                        } 
                    },
                    messages: {
                        username: {
                            required: "กรุณากรอกชื่อผู้ใช้งาน"
                        },
                        phoneNumber: {
                            required: "กรุณากรอกเบอร์โทรศัพท์"
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
                    var username = $("#username").val();
                    showMessage(data.message,"usermanagement");
                });
                
            }
        }
    });

</script>

</body>
</html>
