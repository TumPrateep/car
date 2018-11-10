<script>
    $(document).ready(function () {
        
        var form = $("#update-member-form"); 

        // form.validate({
        //     rules:{
        //         firstname: {
        //             required: true
        //         },
        //         lastname: {
        //             required: true
        //         },
        //         exp: {
        //             required: true
        //         },
        //         phone: {
        //             required: true
        //         },
        //         skill: {
        //             required: true
        //         }
        //     },messages:{
        //         firstname: {
        //             required: "กรุณากรอกชื่อ"
        //         },
        //         lastname: {
        //             required: "กรุณากรอกนามสกุล"
        //         },
        //         exp: {
        //             required: "กรุณากรอกประสบการณ์(ปี)"
        //         },
        //         phone: {
        //             required: "กรุณากรอกเบอร์โทรศัพท์"
        //         },
        //         skill: {
        //             required: "กรุณาเลือกความชำนาญ"
        //         }
        //     }
        // });

        // form.submit(function (e) { 
        //     e.preventDefault();
        //     var isValid = form.valid();
        //     if(isValid){
        //         alert("pass");
        //     }else{
        //         alert("unpass");
        //     }
        // });

    });



        var mechanicId = $("#mechanicId").val();

        $.post(base_url+"apiGarage/Mechaniccreates/getMechaniccreates",{
            "mechanicId" : mechanicId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"garage/mechanic");
            }

            if(data.message == 200){
                result = data.data;
                $("#firstName").val(result.firstName);
                $("#lastName").val(result.lastName);
                $("#exp").val(result.exp);
                $("#personalid").val(result.personalid);
                $("#phone").val(result.phone);
                $("#skill").val(result.skill);
            }
            
        });



        $("#submit").validate({
                rules: {
                    firstName: {
                        required: true
                    }
                },
                messages: {
                    firstName: {
                        required: "กรุณากรอกชื่อ"
                    }
                }
        });

        $("#submit").submit(function(){
            updatemechanic();
        })


        function updatemechanic(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"apiGarage/Mechaniccreates/updateMechaniccreates",data,
                function(data){
                    if(data.message == 200){
                        showMessage(data.message,"garage/mechanic/");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }
</script>

</body>
</html>