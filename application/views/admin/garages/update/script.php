<script>

    var garageId = $("#garageId").val();
    $.post(base_url+"api/Garages/getgarage",{
        "garageId": garageId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/garages");
        }
        if(data.message == 200){
            result = data.data;
            $("#garageName").val(result.garageName);
            
        }
        
    });
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
        
$("#update-garages").validate({
            rules: {
                garageName: {
                    required: true
                },
                businessRegistration: {
                    required: true
                },
                firstnameGarage: {
                    required: true
                },
                lastnameGarage: {
                    required: true
                },
                idcardGarage: {
                    required: true,
                    pid: true
                },
                addressGarage: {
                    required: true
                },
                "garage-provinceId": {
                    required: true
                },
                "garage-districtId": {
                    required: true
                },
                "garage-subdistrictId": {
                    required: true
                },
                "zipCode": {
                    required: true,
                    zipCode: true
                }
            },
            messages: {
                garageName: {
                    required: "กรุณากรอกชื่ออู่"
                },
                businessRegistration: {
                    required: "กรุณากรอกหมายเลขทะเบียนการค้า"
                },
                firstnameGarage: {
                    required: "กรุณากรอกชื่อ"
                },
                lastnameGarage: {
                    required: "กรุณากรอกนามสกุล"
                },
                idcardGarage: {
                    required: "กรุณากรอกเลขบัตรประชาชน"
                },
                addressGarage: {
                    required: "กรุณากรอกที่อยู่"
                },
                "garage-provinceId": {
                    required: "กรุณาเลือกจังหวัด"
                },
                "garage-districtId": {
                    required: "กรุณาเลือกอำเภอ"
                },
                "garage-subdistrictId": {
                    required: "กรุณาเลือกตำบล"
                },
                zipCode: {
                    required: "กรุณากรอกรหัสไปรษณีย์"
                }
            }
        });
        
        
        function updategarage(){
            event.preventDefault();
            var isValid = $("#update-garages").valid();
            if(isValid){
                var data = $("#update-garages").serialize();
                $.post(base_url+"api/garages/update",data,
                function(data){
                    if(data.message == 200){
                        showMessage(data.message,"admin/garages");
                    }else{
                        showMessage(data.message,);
                    }
                });
            }
        }

</script>
</body>
</html>