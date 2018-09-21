
<script>
    $(document).ready(function () {
        var login = $("#login");
        var errorMessage = $("#error-message");
        login.validate({
            rules:{
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },messages:{
                username: {
                    required: "กรอกชื่อผู้ใช้งานหรือเบอร์โทรศัพท์"
                },
                password: {
                    required: "กรอกรหัสผ่าน"
                }
            }
        });

        login.submit(function(event){
            event.preventDefault();
            var isValid = login.valid();
            if(isValid){
                var data = login.serialize();
                errorMessage.hide();
                $.post(base_url+"api/Auth/login", data,
                    function (data, textStatus, jqXHR) {
                        var message = data.message;
                        if(message == "2001"){
                            localStorage.token = data.token;
                            localStorage.userId = data.userId;
                            window.location = base_url+"role";
                        }else if(message == "2002"){
                            errorMessage.html("ไม่พบชื่อผู้ใช้งาน <a href='"+base_url+"register"+"'>ลงทะเบียน</a>");
                            errorMessage.show();
                        }else if(message == "2003"){
                            errorMessage.html("ชื่อผู้ใช้งานถูกปิดใช้งาน");
                            errorMessage.show();
                        }else{
                            errorMessage.html("ชื่อหรือรหัสผ่านไม่ถูกต้อง");
                            errorMessage.show();
                        }
                    }
                );
            }
        });
    });
</script>

</body>

</html>