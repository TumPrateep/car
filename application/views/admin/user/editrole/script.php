<script>
    $(document).ready(function(){

        var provincePlateDropdown = $("#provincePlate");
        provincePlateDropdown.append('<option value="">เลือกจังหวัด</option>');

        var provinceDropdown = $("#provinceId");
        provinceDropdown.append('<option value="">เลือกจังหวัด</option>');

        var districtDropdown = $('#districtId');
        districtDropdown.append('<option value="">เลือกอำเภอ</option>');

        var subdistrictDropdown = $('#subdistrictId');
        subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        function onLoad(){
            loadProvince();
        }
        function onLoadprovinceforcar(){
            loadProvince1();
        }

        onLoad();
        onLoadprovinceforcar();

        function loadProvince1(){
        $.post(base_url+"api/location/getProvinceforcar",{},
            function(data){
            var provinceforcar = data.data;
            $.each(provinceforcar, function( index, value ) {
                provincePlateDropdown.append('<option value="'+value.provinceforcarId+'">'+value.provinceforcarName+'</option>');
            });
            }
        );
        }

        provinceDropdown.change(function(){
        var provinceforcarId = $(this).val();
        loadDistrict(provinceforcarId);
        });

        function loadProvince(){
            $.post(base_url+"api/location/getProvince",{},
                function(data){
                var province = data.data;
                $.each(province, function( index, value ) {
                    provinceDropdown.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
                });
                }
            );
        }

        provinceDropdown.change(function(){
            var provinceId = $(this).val();
            loadDistrict(provinceId);
        });

        function loadDistrict(provinceId){
            districtDropdown.html("");
            districtDropdown.append('<option value="">เลือกอำเภอ</option>');
            subdistrictDropdown.html("");
            subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

            $.post(base_url+"api/location/getDistrict",{
                provinceId: provinceId
            },function(data){
                var district = data.data;
                $.each(district, function( index, value ) {
                    districtDropdown.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
                });
                }
            );
        }

        districtDropdown.change(function(){
            var districtId = $(this).val();
            loadSubdistrict(districtId);
        });

        function loadSubdistrict(districtId){
        subdistrictDropdown.html("");
        subdistrictDropdown.append('<option value="">เลือกตำบล</option>');
        
        $.post(base_url+"api/location/getSubdistrict",{
            districtId: districtId
        },function(data){
            var subDistrict = data.data;
            $.each(subDistrict, function( index, value ) {
                subdistrictDropdown.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
            });
            }
        );

        }
        jQuery.validator.addMethod("numberPlate", function(value, element) {
            return this.optional( element ) || /^[0-9]*$/.test( value );
        }, 'กรุณากรอกตัวเลขเท่านั้น');
        

        jQuery.validator.addMethod("mileage", function(value, element) {
            return this.optional( element ) || /^[0-9]*$/.test( value );
        }, 'กรุณากรอกตัวเลขเท่านั้น');

        jQuery.validator.addMethod("zipCode", function(value, element) {
            return this.optional( element ) || /^[0-9]*$/.test( value );
        }, 'กรุณากรอกตัวเลขเท่านั้น');
        $("#form-role-4").validate({
        rules:{
            licensePlate: {
            required: true
            },
            mileage: {
            required: true,
            mileage:true
            },
            colorCar: {
            required: true
            },
            characterPlate: {
            required: true
            },
            numberPlate: {
            required: true,
            numberPlate:true
            },
            provincePlate: {
            required: true
            }
            // ,
            // frontPicture:{
            //   required: true
            // },
            // backPicture:{
            //   required: true
            // },
            // circlesignPicture:{
            //   required: true
            // }
        },
        messages:{
            licensePlate: {
            required: "กรุณากรอกทะเบียนรถ"
            },
            mileage: {
            required: "กรุณากรอกจำนวนเลขไมล์"
            },
            colorCar: {
            required: "กรุณากรอกสีของรถ"
            },
            characterPlate: {
            required: "กรุณากรอกตัวอักษรนำหน้า"
            },
            numberPlate: {
            required: "กรุณากรอกตัวเลข"
            },
            provincePlate: {
            required: "กรุณากรอกจังหวัด"
            }
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
        }, 'กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง');

        $("#form-role-3").validate({
        rules:{
            garageName:{
                required: true
            },
            businessRegistration:{
                required: true
            },
            firstnameGarage:{
                required: true
            },
            lastnameGarage:{
                required: true
            },
            idcardGarage:{
                required: true,
            pid: true
            },
            addressGarage:{
                required: true
            },
            "garage-provinceId":{
                required: true
            },
            "garage-districtId":{
                required: true
            },
            "garage-subdistrictId":{
                required: true
            },
            "zipCode":{
                required: true,
                zipCode :true 
            }
        },
        messages:{
            garageName:{
                required: "กรุณากรอกชื่ออู่"
            },
            businessRegistration:{
                required: "กรุณากรอกหมายเลขทะเบียนการค้า"
            },
            firstnameGarage:{
                required: "กรุณากรอกชื่อ"
            },
            lastnameGarage:{
                required: "กรุณากรอกนามสกุล"
            },
            idcardGarage:{
                required: "กรุณากรอกเลขบัตรประชาชน"
            }, 
            addressGarage:{
                required: "กรุณากรอกที่อยู่"
            },
            "garage-provinceId":{
                required: "กรุณาเลือกจังหวัด"
            },
            "garage-districtId":{
                required: "กรุณาเลือกอำเภอ"
            },
            "garage-subdistrictId":{
                required: "กรุณาเลือกตำบล"
            },
                zipCode:{
                required: "กรุณากรอกรหัสไปรษณีย์"
            }
        }
        });

        $("#form-role-2").validate({
        rules:{
            car_accessoriesName:{
                required: true
            },
            businessRegistration:{
                required: true
            },
            "sparepart-firstname":{
                required: true
            },
            "sparepart-lastname":{
                required: true
            },
            "sparepart-idcard":{
                required: true,
                pid: true
            },
            "sparepart-address":{
                required: true
            },
            "sparepart-provinceId":{
                required: true
            },
            "sparepart-districtId":{
                required: true
            },
            "sparepart-subdistrictId":{
                required: true
            },
            "sparepart-zipCode":{
                required: true,
                zipCode :true 
            } 
        },
        messages:{
            car_accessoriesName:{
                required: "กรุณากรอกชื่ออู่"
            },
            businessRegistration:{
                required: "กรุณากรอกหมายเลขทะเบียนการค้า"
            },
            "sparepart-firstname":{
                required: "กรุณากรอกชื่อ"
            },
            "sparepart-lastname":{
                required: "กรุณากรอกนามสกุล"
            },
            "sparepart-idcard":{
                required: "กรุณากรอกเลขบัตรประชาชน"
            }, 
            "sparepart-address":{
                required: "กรุณากรอกที่อยู่"
            },
            "sparepart-provinceId":{
                required: "กรุณาเลือกจังหวัด"
            },
            "sparepart-districtId":{
                required: "กรุณาเลือกอำเภอ"
            },
            "sparepart-subdistrictId":{
                required: "กรุณาเลือกตำบล"
            },
            "sparepart-zipCode":{
                required: "กรุณากรอกรหัสไปรษณีย์"
            }
        }
        });

        $("#role").imagepicker({
            show_label: true
        });
        // Toolbar extra buttons
        var btnFinish = $('<button disabled></button>').text('เสร็จสิ้น')
                .addClass('btn btn-info btn-finish')
                .on('click', function(){
                finish();
                });
        var btnCancel = $('<button></button>').text('ยกเลิก')
                .addClass('btn btn-danger')
                .on('click', function(){ 
                window.location.assign(base_url+"Auth/logout");
                });

        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect:'fade',
            // showStepURLhash: true,
            toolbarSettings: {
                // toolbarPosition: 'both',
                toolbarButtonPosition: 'end',
                toolbarExtraButtons: [btnFinish, btnCancel]
            },
            anchorSettings: {
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                // removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            }
        });

        // $('#smartwizard').smartWizard("reset");
        

        $("#form-1").validate({
        rules:{
            titleName:{
                required: true
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            address:{
                required: true
            },
            provinceId:{
                required: true
            },
            districtId: {
                required: true
            },
            subdistrictId: {
                required: true
            },
            phone1: {
                minlength: 9
            },
            phone2: {
                required: true,
                minlength: 9
            }
        },
        messages:{
            titleName:{
                required: "กรุณาเลือกคำนำหน้า"
            },
            firstname: {
                required: "กรุณากรอกชื่อ"
            },
            lastname: {
                required: "กรุณากรอกนามสกุล"
            },
            address:{
                required: "กรุณากรอกที่อยู่"
            },
            provinceId:{
                required: "กรุณาเลือกจังหวัด"
            },
            districtId: {
                required: "กรุณาเลือกอำเภอ"
            },
            subdistrictId: {
                required: "กรุณาเลือกตำบล"
            },
            phone1: {
                minlength:"กรุณากรอกตัวเลขอย่างน้อย 9 ตัว"
            },
            phone2: {
                required: "กรุณากรอกเบอร์โทรที่สามารถติดต่อได้",
                minlength:"กรุณากรอกตัวเลขอย่างน้อย 9 ตัว"
            }
        }
        });

        $("#form-2").validate({
            rules:{
                role: {
                required: true
                }
            },
            messages:{
                role: {
                required: "กรุณาเลือกประเภทผู้ใช้งาน"
                }
            }
        });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if(stepDirection === 'forward' && elmForm){ 
                var id = "#form-"+(stepNumber+1);
                var isValid = $(id).valid();
                return isValid;
            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if(stepNumber == 2){
                showRole();
                $('.btn-finish').prop('disabled', false);
            }else{
                $('.btn-finish').prop('disabled', true);
            }
        });

        function showRole(){
            var role = $("#role").val();
            clear();
            if(role == '2'){
                $("#role-2").show();
                loadSparepartProvince();
            }else if(role == '3'){
                $("#role-3").show();
                loadGarageProvince();
            }else if(role == '4'){
                $("#role-4").show();
            }else{
                $("#role-1").show();
            }
        // $("#content").css("min-height", "138px");
        }

        function clear(role){
            $("#role-4").hide();
            $("#role-3").hide();
            $("#role-2").hide();
            $("#role-1").hide();
        }
        });

        var garageProvinceDropdown = $("#garage-provinceId");
        garageProvinceDropdown.append('<option value="">เลือกจังหวัด</option>');

        var garageDistrictDropdown = $('#garage-districtId');
        garageDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');

        var garageSubdistrictDropdown = $('#garage-subdistrictId');
        garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        function loadGarageProvince(){
        $.post(base_url+"api/location/getProvince",{},
        function(data){
        var province = data.data;
        $.each(province, function( index, value ) {
            garageProvinceDropdown.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
        });
        }
        );
        }

        garageProvinceDropdown.change(function(){
        var provinceId = $(this).val();
        loadGarageDistrict(provinceId);
        });

        function loadGarageDistrict(provinceId){
        garageDistrictDropdown.html("");
        garageDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');
        garageSubdistrictDropdown.html("");
        garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        $.post(base_url+"api/location/getDistrict",{
        provinceId: provinceId
        },
        function(data){
        var district = data.data;
        $.each(district, function( index, value ) {
            garageDistrictDropdown.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
        });
        }
        );

        }

        garageDistrictDropdown.change(function(){
        var districtId = $(this).val();
        loadGarageSubdistrict(districtId);
        });

        function loadGarageSubdistrict(districtId){
        garageSubdistrictDropdown.html("");
        garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        $.post(base_url+"api/location/getSubdistrict",{
        districtId: districtId
        },
        function(data){
        var subDistrict = data.data;
        $.each(subDistrict, function( index, value ) {
            garageSubdistrictDropdown.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
        });
        }
        );

        }

        var sparepartProvinceDropdown = $("#sparepart-provinceId");
        sparepartProvinceDropdown.append('<option value="">เลือกจังหวัด</option>');

        var sparepartDistrictDropdown = $('#sparepart-districtId');
        sparepartDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');

        var sparepartSubdistrictDropdown = $('#sparepart-subdistrictId');
        sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        function loadSparepartProvince(){
        $.post(base_url+"api/location/getProvince",{},
        function(data){
        var province = data.data;
        $.each(province, function( index, value ) {
            sparepartProvinceDropdown.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
        });
        }
        );
        }

        sparepartProvinceDropdown.change(function(){
        var provinceId = $(this).val();
        loadSparepartDistrict(provinceId);
        });

        function loadSparepartDistrict(provinceId){
        sparepartDistrictDropdown.html("");
        sparepartDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');
        sparepartSubdistrictDropdown.html("");
        sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        $.post(base_url+"api/location/getDistrict",{
        provinceId: provinceId
        },
        function(data){
        var district = data.data;
        $.each(district, function( index, value ) {
            sparepartDistrictDropdown.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
        });
        }
        );

        }

        sparepartDistrictDropdown.change(function(){
        var districtId = $(this).val();
        loadSparepartSubdistrict(districtId);
        });

        function loadSparepartSubdistrict(districtId){
        sparepartSubdistrictDropdown.html("");
        sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        $.post(base_url+"api/location/getSubdistrict",{
        districtId: districtId
        },
        function(data){
        var subDistrict = data.data;
        $.each(subDistrict, function( index, value ) {
            sparepartSubdistrictDropdown.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
        });
        }
        );

        }

    function finish(){
          var role = $("#role").val();
          var id = "#form-role-"+role;
          var isValid = $(id).valid();
          var userId = $("#userId").val();
          if(isValid){
            var formData = new FormData();
            formData.append("role",role);
            formData.append("userId", userId);
            
            var profileData = $("#form-1").serializeArray();
            $.each(profileData, function( index, value ) {
              formData.append(value.name, value.value);
            });

            if(role == "3"){ //อู่
              formData.append("garageName", $("#garageName").val());
              formData.append("businessRegistration", $("#businessRegistration").val());
              formData.append("garageAddress", $("#addressGarage").val());
              formData.append("provinceId", $("#garage-provinceId").val());
              formData.append("districtId", $("#garage-districtId").val());
              formData.append("subdistrictId", $("#garage-subdistrictId").val());
              formData.append("postCode", $("#zipCode").val());
              formData.append("latitude", $("#latitude").val());
              formData.append("longtitude", $("#longtitude").val());
              formData.append("comment", $("#comment").val());
              var isCheckBox1 = $("#box1").is(':checked');
              var isCheckBox2 = $("#box2").is(':checked');
              var isCheckBox3 = $("#box3").is(':checked');
              var isCheckBox4 = $("#box4").is(':checked');
              var checkBox1 = (isCheckBox1)?1:2;
              var checkBox2 = (isCheckBox2)?1:2;
              var checkBox3 = (isCheckBox3)?1:2;
              var checkBox4 = (isCheckBox4)?1:2;
              formData.append("option1", checkBox1);
              formData.append("option2", checkBox2);
              formData.append("option3", checkBox3);
              formData.append("option4", checkBox4);
              formData.append("option_other", $("#other").val());
              formData.append("garagePicture", $("#garagePicture")[0].files[0]);
              formData.append("firstnameGarage", $("#firstnameGarage").val());  
              formData.append("lastnameGarage", $("#lastnameGarage").val());  
              formData.append("idcardGarage", $("#idcardGarage").val());  
              formData.append("addressGarage", $("#addressGarage").val());                                 
            }else if(role == "2"){ //ร้านค้าอะไหล่
              formData.append("car_accessoriesName", $("#car_accessoriesName").val());
              formData.append("businessRegistrationAccessories", $("#businessRegistrationAccessories").val());
              formData.append("sparepart-firstname", $("#sparepart-firstname").val());  
              formData.append("sparepart-lastname", $("#sparepart-lastname").val());  
              formData.append("sparepart-idcard", $("#sparepart-idcard").val());  
              formData.append("sparepart-address", $("#sparepart-address").val());
              formData.append("sparepart-provinceId", $("#sparepart-provinceId").val());
              formData.append("sparepart-districtId", $("#sparepart-districtId").val());
              formData.append("sparepart-subdistrictId", $("#sparepart-subdistrictId").val());
              formData.append("sparepart-postCode", $("#sparepart-zipCode").val());
            }else if(role == "4"){
              formData.append("frontPicture", $("#frontPicture")[0].files[0]);
              formData.append("backPicture", $("#backPicture")[0].files[0]);
              formData.append("circlesignPicture", $("#circlesignPicture")[0].files[0]);
              formData.append("characterPlate", $("#characterPlate").val());
              formData.append("numberPlate", $("#numberPlate").val());
              formData.append("provincePlate", $("#provincePlate").val());
              formData.append("mileage", $("#mileage").val());
              formData.append("colorCar", $("#colorCar").val());
            }

            $.ajax({
                url: base_url+"api/UserManagement/userTypeAndData",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/usermanagement");
                    }else{
                        showMessage(data.message);
                    }
                }
            });

          }
        }
        var userId = $("#userId").val();
        var category = $("#category").val();

        $.post(base_url+"api/UserManagement/getuserprofile",{
            "userId": userId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/usermanagement");
            }

            if(data.message == 200){
                result = data.profile;
                $("#firstname").val(result.firstname);
                $("#lastname").val(result.lastname);
                $("#phone1").val(result.phone1);
                $("#phone2").val(result.phone2);
                $("#provinceId").val(result.provinceId);
                $("#districtId").val(result.districtId);
                $("#subdistrictId").val(result.subdistrictId);
                $("#address").val(result.address);
                $("#titleName").val(result.titleName);
            }
            
        });

        
        

        // $.post(base_url+"api/UserManagement/getuserprofile3",{
        //     "category": category,
        //     "userId": userId

        // },function(data){
        //     if(data.message!=200){
        //         showMessage(data.message,"admin/usermanagement");
        //     }

        //     if(data.message == 200){
        //         result = data.data;
        //         $("#mileage").val(result.mileage);
        //         $("#pictureFront").val(result.pictureFront);
        //         $("#pictureBack").val(result.pictureBack);
        //         $("#circlePlate").val(result.circlePlate);
        //         $("#province_plate").val(result.province_plate);
        //         $("#character_plate").val(result.character_plate);
        //         $("#number_plate").val(result.number_plate);
        //         $("#color").val(result.color);
               
        //     }
            
        // });
    
</script>

</body>
</html>
