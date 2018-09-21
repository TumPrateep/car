<script>
    $(document).ready(function () {
        var register = $("#register");
        var errorMessage = $("#error-message");

        register.validate({
            rules:{
                username: {
                    required: true,
                    minlength: 5
                },
                phone: {
                    required: true,
                    minlength: 10
                },
                email: {
                    email:true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_again: {
                    required: true,
                    equalTo: "#password"
                }
            },messages:{
                username: {
                    required: "กรอกชื่อผู้ใช้งานหรือเบอร์โทรศัพท์",
                    minlength: "กรอกชื่อผู้ใช้งานมากกว่า 5 ตัว"
                },
                phone: {
                    required: "กรอกเบอร์โทรศัพท์",
                    minlength: "กรอกเบอร์โทรให้ครบถ้วน"
                },
                email: {
                    email:"รูปแบบอีเมล์ไม่ถูกต้อง"
                },
                password: {
                    required: "กรอกรหัสผ่าน",
                    minlength: "กรอกรหัสผ่านมากกว่า 6 ตัว"
                },
                password_again: {
                    required: "กรอกยืนยันรหัสผ่าน",
                    equalTo: "รหัสผ่านไม่ตรงกัน"
                }
            }
        });
        
        register.submit(function (e) { 
            e.preventDefault();
            var isValid = register.valid();
            if(isValid){
                var data = register.serialize();
                errorMessage.hide();
                $.post(base_url+"api/register/register", data,
                    function (data, textStatus, jqXHR) {
                        if(data.message == 200){
                            alert("บันทึกสำเร็จ");
                        }
                    }
                ).fail(function(data) {
                    if(data.responseJSON.message == 3001){
                        errorMessage.html("ชื่อผู้ใช้งานหรือเบอร์โทรนี้ถูกใช้งานแล้ว");
                        errorMessage.show();
                    }
                })
            }
        });

    });
</script>

</body>

</html>