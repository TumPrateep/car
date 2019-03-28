<script>

    function checkID(id) {
            if(id.length != 13) return false;
            for(i=0, sum=0; i < 12; i++)
                sum += parseFloat(id.charAt(i))*(13-i);
            if((11-sum%11)%10!=parseFloat(id.charAt(12)))
                return false;
            return true;
        }

        jQuery.validator.addMethod("pid", function(value, element) {
          return checkID(value);
        }, 'กรุณากรอกเลขที่บัตรประชาชนให้ถูกต้อง');


    $(document).ready(function () {

        var letters = /^[ก-๙a-zA-Z]+$/;  
        var form = $("#submit");
        
        jQuery.validator.addMethod("THEN", function(value, element) {
            return this.optional(element) || /^[ก-๙a-zA-Z]+$/.test(value);
        }, 'asasas');

        // form.validate({
        //     rules:{
        //         firstName: {
        //             required: true,
        //             THEN: true
        //         },
        //         lastName: {
        //             required: true,
        //             THEN: true
        //         },
        //         exp: {
        //             required: true
        //         },
        //         phone: {
        //             required: true,
        //             minlength: 9,
        //             maxlength: 10
        //         },
        //         skill: {
        //             required: true
        //         },
        //         personalid: {
        //             required: true,
        //             pid: true
        //         }
        //     },messages:{
        //         firstName: {
        //             required: "กรุณากรอกชื่อ",
        //             THEN: "กรอกข้อมูลไม่ถูกต้อง"
        //         },
        //         lastName: {
        //             required: "กรุณากรอกนามสกุล",
        //             THEN: "กรอกข้อมูลไม่ถูกต้อง"
        //         },
        //         exp: {
        //             required: "กรุณากรอกประสบการณ์(ปี)"
        //         },
        //         phone: {
        //             required: "กรุณากรอกเบอร์โทรศัพท์",
        //             minlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
        //             maxlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ"
        //         },
        //         skill: {
        //             required: "กรุณาเลือกความชำนาญ"
        //         },
        //         personalid: {
        //             required: "กรุณาใส่บัตรประชาชน",
        //             pid: "กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง"
        //         }
        //     }
        // });
    });

 


        var orderId = $("#orderId").val();

        $.post(base_url+"apiCaraccessories/Deliverorder/getexport",{
            "orderId" : orderId
        },function(data){
            // console.log(data.data);
            if(data.message!=200){
                // showMessage(data.message,"car/caraccessory");  garageName
            }
            if(data.message == 200){
                result = data.data;
                $("#car_accessoriesName").val(result.car_accessoriesName);
                $("#phone").val(result.phone);
                $("#address").val(result.address);
                // $("#garageName").val(result.garageName);
            }
            
        });

    
        $("#submit").submit(function(){
            updatemechanic();
        })


        // function updatemechanic(){
        //     event.preventDefault();
        //     var isValid = $("#submit").valid();
           
            
        //     if(isValid){
        //         var imageData = $('.image-editor').cropit('export');
        //         $('.hidden-image-data').val(imageData);
        //         var myform = document.getElementById("submit");
        //         var formData = new FormData(myform);

        //         $.ajax({
        //         url: base_url+"apiGarage/Mechanic/updateOwner",
        //         data: formData,
        //         processData: false,
        //         contentType: false,
        //         type: 'POST',
        //         success: function(data){
        //             if(data.message == 200){
        //                 showMessage(data.message,"garage/managegarage/");
        //             }else{
        //                 showMessage(data.message);
        //             }
        //         }
        //       });
        //     }
        // };
        
</script>

</body>
</html>