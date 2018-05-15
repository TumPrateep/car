<script>
   $("#group").validate({
            rules: {
                userName: {
                required: true
                },
                phoneNumber: {
                required: true
                } 
            },
            messages: {
                userName: {
                required: "กรุณากรอกชื่อผู้ใช้งาน"
                },
                phoneNumber: {
                required: "กรุณากรอกเบอร์โทรศัพท์"
                }
            },
        });

</script>

</body>
</html>
