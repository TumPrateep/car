<script>
    $(document).ready(function () {
        var form = $("#submit");
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
                },
                personalid:{
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
                },
                personalid:{
                    required: "กรอกหมายเลขประจำตัวประชาชน"
                }
            }
        });
        // form.submit(function (e) { 
        //     e.preventDefault();
        //     var isValid = form.valid();
        //     if(isValid){
        //         alert("pass");
        //     }else{
        //         alert("unpass");
        //     }
        // });
    form.submit(function(){
        createMechanic();
    })
    function createMechanic(){
        event.preventDefault();
        var isValid = form.valid();
        
        if(isValid){
            
            var data = $("#submit").serialize();
            $.post(base_url+"apiGarage/Mechanic/createMechanic",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/mechanic");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
    
    });
</script>

</body>
</html>