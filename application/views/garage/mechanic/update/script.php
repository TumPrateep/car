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

        form.validate({
            rules:{
                firstname: {
                    required: true,
                    THEN: true
                },
                lastname: {
                    required: true,
                    THEN: true
                },
                exp: {
                    required: true,
                    maxlength: 2,
                    max: 50
                },
                phone: {
                    required: true,
                    minlength: 9,
                    maxlength: 10
                },
                skill: {
                    required: true
                },
                personalid: {
                    required: true,
                    pid: true
                },
                nickName:{
                    THEN: true
                }
            },messages:{
                firstname: {
                    required: "กรุณากรอกชื่อ",
                    THEN: "กรอกข้อมูลไม่ถูกต้อง"
                },
                lastname: {
                    required: "กรุณากรอกนามสกุล",
                    THEN: "กรอกข้อมูลไม่ถูกต้อง"
                },
                exp: {
                    required: "กรุณากรอกประสบการณ์(ปี)",
                    maxlength: "กรุณากรอกข้อมูลตามจริง",
                    max: "กรุณากรอกข้อมูลตามจริง",
                    min: "กรุณากรอกข้อมูลตามจริง"
                },
                phone: {
                    required: "กรุณากรอกเบอร์โทรศัพท์",
                    minlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
                    maxlength: "กรอกข้อมูลไม่ถูกต้อง",
                    min: "กรอกข้อมูลไม่ถูกต้อง"
                },
                skill: {
                    required: "กรุณาเลือกความชำนาญ"
                },
                personalid: {
                    required: "กรุณาใส่บัตรประชาชน",
                    pid: "กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง"
                },
                nickName:{
                    THEN: "กรอกข้อมูลไม่ถูกต้อง"
                }
            }
        });
    });

 


        var mechanicId = $("#mechanicId").val();

        $.post(base_url+"apigarage/Mechanic/getMechanic",{
            "mechanicId" : mechanicId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"garage/mechanic");
            }

            if(data.message == 200){
                result = data.data;
                $("#firstName").val(result.firstName);
                $("#lastName").val(result.lastName);
                $("#nickName").val(result.nickName);
                $("#exp").val(result.exp);
                $("#personalid").val(result.personalid);
                $("#phone").val(result.phone); 
                $("#job").val(result.job);
                setBrandPicture(result.picture);
            }
            
        });

        function setBrandPicture(picture){
                    $('.image-editor').cropit({
                        allowDragNDrop: false,
                        width: 200,
                        height: 200,
                        type: 'image',
                        imageState: {
                            src: picturePath+"mechanic/"+picture
                        }
                    });
                }


        // $("#submit").validate({
        //         rules: {
        //             firstName: {
        //                 required: true
        //             }
        //         },
        //         messages: {
        //             firstName: {
        //                 required: "กรุณากรอกชื่อ"
        //             }
        //         }
        // });

        $("#submit").submit(function(){
            updatemechanic();
        })


        function updatemechanic(){
            event.preventDefault();
            var isValid = $("#submit").valid();
           
            
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);

                $.ajax({
                url: base_url+"apigarage/Mechanic/updateMechanic",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"garage/mechanic/");
                    }else{
                        showMessage(data.message);
                    }
                }
              });
            }
        };


    
        
</script>

</body>
</html>