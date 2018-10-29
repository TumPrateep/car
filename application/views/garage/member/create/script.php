<script>
    $(document).ready(function () {

        var form = $("#create-member-form");

        form.validate({
            rules:{
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                exp: {
                    required: true
                },
                phone: {
                    required: true
                },
                skill: {
                    required: true
                }
            },messages:{
                firstname: {
                    required: "กรุณากรอกชื่อ"
                },
                lastname: {
                    required: "กรุณากรอกนามสกุล"
                },
                exp: {
                    required: "กรุณากรอกประสบการณ์(ปี)"
                },
                phone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์"
                },
                skill: {
                    required: "กรุณาเลือกความชำนาญ"
                }
            }
        });

        form.submit(function (e) { 
            e.preventDefault();
            var isValid = form.valid();
            if(isValid){
                alert("pass");
            }else{
                alert("unpass");
            }
        });


    });
</script>

</body>
</html>