<script>
     $("#group").validate({
            rules: {
                userName: {
                    required: true
                },
                phoneNumber: {
                    required: true
                },
                email: {
                    email: true
                } 
            },
            messages: {
                userName: {
                    required: "กรุณากรอกชื่อผู้ใช้งาน"
                },
                phoneNumber: {
                    required: "กรุณากรอกเบอร์โทรศัพท์"
                },
                email: {
                    email: "กรุณากรอกอีเมลให้ถูกต้อง"
                } 
            },
        });


</script>

</body>
</html>