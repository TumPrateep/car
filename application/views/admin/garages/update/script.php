<script>

    var garageProvince
    var garageDistrict
    var garageSubDistrict
    var garageId = $("#garageId").val();

    
    $.post(base_url+"api/Garages/getgarage",{
        "garageId": garageId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/garages");
        }
        if(data.message == 200){
            result = data.data;

            garageProvince = result.provinceId;
            garageDistrict = result.districtId;
            garageSubDistrict = result.subdistrictId;

            loadGarageProvince();
            
            $("#comment").val(result.comment);
            $("#businessRegistration").val(result.businessRegistration);
            $("#garageName").val(result.garageName);
            $("#garageAddress").val(result.garageAddress);
            $("#zipCode").val(result.postCode);
            $("#latitude").val(result.latitude);
            $("#longtitude").val(result.longtitude);
            $("#garageMaster").val(result.garageMaster);
                if(result.option1 != "2"){
                    $("#box1").prop('checked', true);
                }

                if(result.option2 != "2"){
                    $("#box2").prop('checked', true);
                }

                if(result.option3 != "2"){
                    $("#box3").prop('checked', true);
                }

                if(result.option4 != "2"){
                    $("#box4").prop('checked', true);
                }

            $("#result").val(result.option_outher);
            $("#garagePicture").val(result.garagePicture);
            $("#firstnameGarage").val(result.firstname);
            $("#lastnameGarage").val(result.lastname);
            $("#idcardGarage").val(result.idcard);
            $("#addressGarage").val(result.addressGarage);
            $("#result").val(result.option_outher);
        }
        
    });
    
    var garageProvinceDropdown = $("#garage-provinceId");
    garageProvinceDropdown.append('<option value="">เลือกจังหวัด</option>');

    var garageDistrictDropdown = $('#garage-districtId');
    garageDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');

    var garageSubdistrictDropdown = $('#garage-subdistrictId');
    garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        function loadGarageProvince() {
            $.post(base_url + "api/location/getProvince", {},
                function(data) {
                    var province = data.data;
                    $.each(province, function(index, value) {
                        if(value.provinceId == garageProvince){
                            garageProvinceDropdown.append('<option value="' + value.provinceId + '" selected>' + value.provinceName + '</option>');
                        }else{
                            garageProvinceDropdown.append('<option value="' + value.provinceId + '">' + value.provinceName + '</option>');                            
                        }
                    });

                    if(garageProvince != null){
                        loadGarageDistrict(garageProvince);
                    }
                }
            );
        }

         garageProvinceDropdown.change(function() {
            var provinceId = $(this).val();
            garageProvince = "";
            garageDistrict = "";
            garageSubDistrict = "";
            loadGarageDistrict(provinceId);
        });

        function loadGarageDistrict(provinceId) {
            garageDistrictDropdown.html("");
            garageDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');
            garageSubdistrictDropdown.html("");
            garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

            $.post(base_url + "api/location/getDistrict", {
                    provinceId: provinceId
                },
                function(data) {
                    var district = data.data;
                    $.each(district, function(index, value) {
                        if(value.districtId == garageDistrict){
                            garageDistrictDropdown.append('<option value="' + value.districtId + '" selected>' + value.districtName + '</option>');                            
                        }else{
                            garageDistrictDropdown.append('<option value="' + value.districtId + '">' + value.districtName + '</option>');                            
                        }
                    });

                    if(garageDistrict != null){
                        loadGarageSubdistrict(garageDistrict);
                    }
                }
            );

        }

        garageDistrictDropdown.change(function() {
            var districtId = $(this).val();
            loadGarageSubdistrict(districtId);
        });

        function loadGarageSubdistrict(districtId) {
            garageSubdistrictDropdown.html("");
            garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

            $.post(base_url + "api/location/getSubdistrict", {
                    districtId: districtId
                },
                function(data) {
                    var subDistrict = data.data;
                    $.each(subDistrict, function(index, value) {
                        if(value.subdistrictId == garageSubDistrict){
                            garageSubdistrictDropdown.append('<option value="' + value.subdistrictId + '" selected>' + value.subdistrictName + '</option>');
                        }else{
                            garageSubdistrictDropdown.append('<option value="' + value.subdistrictId + '">' + value.subdistrictName + '</option>');
                        }
                    });
                }
            );

        }
    
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
                    minlength:5
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
                    required: "กรุณากรอกรหัสไปรษณีย์",
                    minlength: "กรุณากรอกรหัสไปรษณีย์ให้ถูกต้อง"
                }
            }
        });
        
        
        $("#update-garages").submit(function(){
            updategarage();
        })

        function updategarage(){
            event.preventDefault();
            var isValid = $("#update-garages").valid();
            if(isValid){
                var data = $("#update-garages").serialize();
                $.post(base_url+"api/Garages/update",data,
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