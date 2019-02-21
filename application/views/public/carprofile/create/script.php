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

        var form = $("#submit");

        form.validate({
            rules:{
                firstName: {
                    required: true
                },
                lastName: {
                    required: true
                },
                exp: {
                    required: true
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10
                },
                skill: {
                    required: true
                
                },
                personalid: {
                    required: true,
                    pid: true
                   
                
                }
            },messages:{
                firstName: {
                    required: "กรุณากรอกชื่อ"
                },
                lastName: {
                    required: "กรุณากรอกนามสกุล"
                },
                exp: {
                    required: "กรุณากรอกประสบการณ์(ปี)"
                },
                phone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    minlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
                    maxlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ"
                },
                skill: {
                    required: "กรุณาเลือกความชำนาญ"
                
                },
                personalid: {
                    required: "กรุณาใส่บัตรประชาชน",
                    pid: "กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง"
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
                    showMessage(data.message);
                }
                console.log(data);
            });
        }
    }
    

    });
</script>

</body>
</html>