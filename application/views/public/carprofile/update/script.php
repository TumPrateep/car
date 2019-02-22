<script>

    // function checkID(id) {
    //         if(id.length != 13) return false;
    //         for(i=0, sum=0; i < 12; i++)
    //             sum += parseFloat(id.charAt(i))*(13-i);
    //         if((11-sum%11)%10!=parseFloat(id.charAt(12)))
    //             return false;
    //         return true;
    //     }

    //     jQuery.validator.addMethod("pid", function(value, element) {
    //       return checkID(value);
    //     }, 'กรุณากรอกเลขที่บัตรประชาชนให้ถูกต้อง');


    // $(document).ready(function () {

    //     var form = $("#submit");

    //     form.validate({
    //         rules:{
    //             firstName: {
    //                 required: true
    //             },
    //             lastName: {
    //                 required: true
    //             },
    //             exp: {
    //                 required: true
    //             },
    //             phone: {
    //                 required: true,
    //                 minlength: 10,
    //                 maxlength: 10
    //             },
    //             skill: {
    //                 required: true
    //             },
    //             personalid: {
    //                 required: true,
    //                 pid: true
    //                 // minlength: 13,
    //                 // maxlength: 13
                
    //             }
    //         },messages:{
    //             firstName: {
    //                 required: "กรุณากรอกชื่อ"
    //             },
    //             lastName: {
    //                 required: "กรุณากรอกนามสกุล"
    //             },
    //             exp: {
    //                 required: "กรุณากรอกประสบการณ์(ปี)"
    //             },
    //             phone: {
    //                 required: "กรุณากรอกเบอร์โทรศัพท์",
    //                 minlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
    //                 maxlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ"
    //             },
    //             skill: {
    //                 required: "กรุณาเลือกความชำนาญ"
    //             },
    //             personalid: {
    //                 required: "กรุณาใส่บัตรประชาชน",
    //                 pid: "กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง"
    //             }
    //         }
    //     });

    // });



        var car_profileId = $("#car_profileId").val();
        $.post(base_url+"service/Carprofile/getCarProfile",{
            "car_profileId" : car_profileId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"public/carprofile");
            }

            if(data.message == 200){
                result = data.data;
                $("#character_plate").val(result.character_plate);
                $("#number_plate").val(result.number_plate);
                $("#province_plate").val(result.province_plate);
                $("#personalid").val(result.personalid);
                $("#mileage").val(result.mileage);
                $("#color").val(result.color);
            }
            
        });

        $("#submit").submit(function(){
            updatecarprofile();
        })


        function updatecarprofile(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"service/Carprofile/updateCarProfile",data,
                function(data){
                    if(data.message == 200){
                        showMessage(data.message,"public/carprofilepublic");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        };


    
        
</script>

</body>
</html>