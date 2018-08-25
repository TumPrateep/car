<script>
    $(document).ready(function() {
        var profileProvince = "";
        var profileDistrict = "";
        var profileSubDistrict = "";

        var garageProvince = "";
        var garageDistrict = "";
        var garageSubDistrict = "";
        
        var sparepartProvince = "";
        var sparepartDistrict = "";
        var sparepartSubDistrict = "";

        var provinceDropdown = $("#provinceId");
        provinceDropdown.append('<option value="">เลือกจังหวัด</option>');

        var districtDropdown = $('#districtId');
        districtDropdown.append('<option value="">เลือกอำเภอ</option>');

        var subdistrictDropdown = $('#subdistrictId');
        subdistrictDropdown.append('<option value="">เลือกตำบล</option>');
        
        function onLoad(){
            loadProvince();
            $("#role").imagepicker({
                show_label: true,
                initialized: function(imagePicker){
                    $("#role").data('4');
                } 
            });
            // setProvincePlate();
        }

        provinceDropdown.change(function() {
            var provinceforcarId = $(this).val();
            profileProvince = "";
            profileDistrict = "";
            profileSubDistrict = "";
            loadDistrict(provinceforcarId);
        });

        function loadProvince() {
            $.post(base_url + "api/location/getProvince", {},
                function(data) {
                    var province = data.data;
                    $.each(province, function(index, value) {
                        if (value.provinceId == profileProvince) {
                            provinceDropdown.append('<option value="' + value.provinceId + '" selected>' + value.provinceName + '</option>');
                        } else {
                            provinceDropdown.append('<option value="' + value.provinceId + '">' + value.provinceName + '</option>');
                        }
                    });

                    if (provinceDropdown.val() != "") {
                        loadDistrict(provinceDropdown.val());
                    }
                }
            );
        }


        function loadDistrict(provinceId) {
            districtDropdown.html("");
            districtDropdown.append('<option value="">เลือกอำเภอ</option>');
            subdistrictDropdown.html("");
            subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

            $.post(base_url + "api/location/getDistrict", {
                provinceId: provinceId
            }, function(data) {
                var district = data.data;
                $.each(district, function(index, value) {
                    if (value.districtId == profileDistrict) {
                        districtDropdown.append('<option value="' + value.districtId + '" selected>' + value.districtName + '</option>');
                    }else{
                        districtDropdown.append('<option value="' + value.districtId + '">' + value.districtName + '</option>');
                    }
                });

                if (districtDropdown.val() != "") {
                    loadSubdistrict(districtDropdown.val());
                }
            });
        }

        districtDropdown.change(function() {
            var districtId = $(this).val();
            loadSubdistrict(districtId);
        });

        function loadSubdistrict(districtId) {
            subdistrictDropdown.html("");
            subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

            $.post(base_url + "api/location/getSubdistrict", {
                districtId: districtId
            }, function(data) {
                var subDistrict = data.data;
                $.each(subDistrict, function(index, value) {
                    if (value.subdistrictId == profileSubDistrict) {
                        subdistrictDropdown.append('<option value="' + value.subdistrictId + '" selected>' + value.subdistrictName + '</option>');
                    }else{
                        subdistrictDropdown.append('<option value="' + value.subdistrictId + '">' + value.subdistrictName + '</option>');                        
                    }
                });
            });

        }
        jQuery.validator.addMethod("numberPlate", function(value, element) {
            return this.optional(element) || /^[0-9]*$/.test(value);
        }, 'กรุณากรอกตัวเลขเท่านั้น');


        jQuery.validator.addMethod("mileage", function(value, element) {
            return this.optional(element) || /^[0-9]*$/.test(value);
        }, 'กรุณากรอกตัวเลขเท่านั้น');

        jQuery.validator.addMethod("zipCode", function(value, element) {
            return this.optional(element) || /^[0-9]*$/.test(value);
        }, 'กรุณากรอกตัวเลขเท่านั้น');
        $("#form-role-4").validate({
            rules: {
                licensePlate: {
                    required: true
                },
                mileage: {
                    required: true,
                    mileage: true
                },
                colorCar: {
                    required: true
                },
                characterPlate: {
                    required: true
                },
                numberPlate: {
                    required: true,
                    numberPlate: true
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
            messages: {
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
            if (id.length != 13) return false;
            for (i = 0, sum = 0; i < 12; i++)
                sum += parseFloat(id.charAt(i)) * (13 - i);
            if ((11 - sum % 11) % 10 != parseFloat(id.charAt(12)))
                return false;
            return true;
        }

        jQuery.validator.addMethod("pid", function(value, element) {
            return checkID(value);
        }, 'กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง');

        $("#form-role-3").validate({
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

        $("#form-role-2").validate({
            rules: {
                car_accessoriesName: {
                    required: true
                },
                businessRegistration: {
                    required: true
                },
                "sparepart-firstname": {
                    required: true
                },
                "sparepart-lastname": {
                    required: true
                },
                "sparepart-idcard": {
                    required: true,
                    pid: true
                },
                "sparepart-address": {
                    required: true
                },
                "sparepart-provinceId": {
                    required: true
                },
                "sparepart-districtId": {
                    required: true
                },
                "sparepart-subdistrictId": {
                    required: true
                },
                "sparepart-zipCode": {
                    required: true,
                    zipCode: true
                }
            },
            messages: {
                car_accessoriesName: {
                    required: "กรุณากรอกชื่ออู่"
                },
                businessRegistration: {
                    required: "กรุณากรอกหมายเลขทะเบียนการค้า"
                },
                "sparepart-firstname": {
                    required: "กรุณากรอกชื่อ"
                },
                "sparepart-lastname": {
                    required: "กรุณากรอกนามสกุล"
                },
                "sparepart-idcard": {
                    required: "กรุณากรอกเลขบัตรประชาชน"
                },
                "sparepart-address": {
                    required: "กรุณากรอกที่อยู่"
                },
                "sparepart-provinceId": {
                    required: "กรุณาเลือกจังหวัด"
                },
                "sparepart-districtId": {
                    required: "กรุณาเลือกอำเภอ"
                },
                "sparepart-subdistrictId": {
                    required: "กรุณาเลือกตำบล"
                },
                "sparepart-zipCode": {
                    required: "กรุณากรอกรหัสไปรษณีย์"
                }
            }
        });

         $("#form-role-1").validate({
            rules: {
                verified: {
                    required: true
                }
            },
            messages: {
                verified: {
                    required: "กรุณากดยืนยัน"
                }
            }
        });

        // Toolbar extra buttons
        var btnFinish = $('<button class="wizard-delete"></button>').text('เสร็จสิ้น')
            .addClass('btn btn-info btn-finish')
            .on('click', function() {
                finish();
            });
        var btnCancel = $('<button></button>').text('ยกเลิก')
            .addClass('btn btn-danger')
            .on('click', function() {
                window.location.assign(base_url + "admin/usermanagement");
            });

        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect: 'fade',
            // showStepURLhash: true,
            enableAllSteps: true,
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

        $('#smartwizard').smartWizard("reset");

        $("#form-1").validate({
            rules: {
                titleName: {
                    required: true
                },
                firstname: {
                    required: true
                },
                lastname: {
                    required: true
                },
                address: {
                    required: true
                },
                provinceId: {
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
            messages: {
                titleName: {
                    required: "กรุณาเลือกคำนำหน้า"
                },
                firstname: {
                    required: "กรุณากรอกชื่อ"
                },
                lastname: {
                    required: "กรุณากรอกนามสกุล"
                },
                address: {
                    required: "กรุณากรอกที่อยู่"
                },
                provinceId: {
                    required: "กรุณาเลือกจังหวัด"
                },
                districtId: {
                    required: "กรุณาเลือกอำเภอ"
                },
                subdistrictId: {
                    required: "กรุณาเลือกตำบล"
                },
                phone1: {
                    minlength: "กรุณากรอกตัวเลขอย่างน้อย 9 ตัว"
                },
                phone2: {
                    required: "กรุณากรอกเบอร์โทรที่สามารถติดต่อได้",
                    minlength: "กรุณากรอกตัวเลขอย่างน้อย 9 ตัว"
                }
            }
        });

        $("#form-2").validate({
            rules: {
                role: {
                    required: true
                }
            },
            messages: {
                role: {
                    required: "กรุณาเลือกประเภทผู้ใช้งาน"
                }
            }
        });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if (stepDirection === 'forward' && elmForm) {
                var id = "#form-" + (stepNumber + 1);
                var isValid = $(id).valid();
                return isValid;
            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if (stepNumber == 2) {
                showRole();
                $('.btn-finish').removeClass('wizard-delete');
            } else {
                $('.btn-finish').addClass('wizard-delete');
            }
        });

        function showRole() {
            var role = $("#role").val();
            if(role == null){
                role = '4';
            }
            clear();
            if (role == '2') {
                $("#role-2").show();
                loadSparepartProvince();
            } else if (role == '3') {
                $("#role-3").show();
                loadGarageProvince();
            } else if (role == '4') {
                $("#role-4").show();
                setProvincePlate();
            } else {
                $("#role-1").show();
            }
            // $("#content").css("min-height", "138px");
        }

        function clear(role) {
            $("#role-4").hide();
            $("#role-3").hide();
            $("#role-2").hide();
            $("#role-1").hide();
        }

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

            $.post(base_url + "api/Location/getDistrict", {
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

            $.post(base_url + "api/Location/getSubdistrict", {
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

        var sparepartProvinceDropdown = $("#sparepart-provinceId");
        sparepartProvinceDropdown.append('<option value="">เลือกจังหวัด</option>');

        var sparepartDistrictDropdown = $('#sparepart-districtId');
        sparepartDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');

        var sparepartSubdistrictDropdown = $('#sparepart-subdistrictId');
        sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

        function loadSparepartProvince() {
            $.post(base_url + "api/Location/getProvince", {},
                function(data) {
                    var province = data.data;
                    $.each(province, function(index, value) {
                        if(value.provinceId == sparepartProvince){
                            sparepartProvinceDropdown.append('<option value="' + value.provinceId + '" selected>' + value.provinceName + '</option>');    
                        }else{
                            sparepartProvinceDropdown.append('<option value="' + value.provinceId + '">' + value.provinceName + '</option>');                            
                        }
                    });

                    if(province != null){
                        loadSparepartDistrict(sparepartProvince);
                    }
                }
            );
        }

        sparepartProvinceDropdown.change(function() {
            var provinceId = $(this).val();
            sparepartProvince = "";
            sparepartDistrict = "";
            sparepartSubDistrict = "";
            loadSparepartDistrict(provinceId);
        });

        function loadSparepartDistrict(provinceId) {
            sparepartDistrictDropdown.html("");
            sparepartDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');
            sparepartSubdistrictDropdown.html("");
            sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

            $.post(base_url + "api/Location/getDistrict", {
                    provinceId: provinceId
                },
                function(data) {
                    var district = data.data;
                    $.each(district, function(index, value) {
                        if(value.districtId == sparepartDistrict){
                            sparepartDistrictDropdown.append('<option value="' + value.districtId + '" selected>' + value.districtName + '</option>');                            
                        }else{
                            sparepartDistrictDropdown.append('<option value="' + value.districtId + '">' + value.districtName + '</option>');                   
                        }
                    });

                    if(sparepartDistrict != null){
                        loadSparepartSubdistrict(sparepartDistrict);
                    }
                }
            );

        }

        sparepartDistrictDropdown.change(function() {
            var districtId = $(this).val();
            loadSparepartSubdistrict(districtId);
        });

        function loadSparepartSubdistrict(districtId) {
            sparepartSubdistrictDropdown.html("");
            sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

            $.post(base_url + "api/Location/getSubdistrict", {
                    districtId: districtId
                },
                function(data) {
                    var subDistrict = data.data;
                    $.each(subDistrict, function(index, value) {
                        if(value.subdistrictId == sparepartSubDistrict){
                            sparepartSubdistrictDropdown.append('<option value="' + value.subdistrictId + '" selected>' + value.subdistrictName + '</option>');   
                        }else{
                            sparepartSubdistrictDropdown.append('<option value="' + value.subdistrictId + '">' + value.subdistrictName + '</option>');                               
                        }
                    });
                }
            );

        }

        function finish() {
            var role = $("#role").val();
            if(role == null){
                role = "4";
            }
            var id = "#form-role-" + role;
            var isValid = $(id).valid();
            var userId = $("#userId").val();
            if (isValid) {
                var formData = new FormData();
                formData.append("role", role);
                formData.append("userId", userId);

                var profileData = $("#form-1").serializeArray();
                $.each(profileData, function(index, value) {
                    formData.append(value.name, value.value);
                });

                if (role == "3") { //อู่
                    formData.append("garageName", $("#garageName").val());
                    formData.append("businessRegistration", $("#businessRegistration").val());
                    formData.append("garageAddress", $("#addressGarage").val());
                    formData.append("garageProvinceId", $("#garage-provinceId").val());
                    formData.append("garageDistrictId", $("#garage-districtId").val());
                    formData.append("garageSubdistrictId", $("#garage-subdistrictId").val());
                    formData.append("postCode", $("#zipCode").val());
                    formData.append("latitude", $("#latitude").val());
                    formData.append("longtitude", $("#longtitude").val());
                    formData.append("comment", $("#comment").val());
                    var isCheckBox1 = $("#box1").is(':checked');
                    var isCheckBox2 = $("#box2").is(':checked');
                    var isCheckBox3 = $("#box3").is(':checked');
                    var isCheckBox4 = $("#box4").is(':checked');
                    var checkBox1 = (isCheckBox1) ? 1 : 2;
                    var checkBox2 = (isCheckBox2) ? 1 : 2;
                    var checkBox3 = (isCheckBox3) ? 1 : 2;
                    var checkBox4 = (isCheckBox4) ? 1 : 2;
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
      
                } else if (role == "2") { //ร้านค้าอะไหล่
                    formData.append("car_accessoriesName", $("#car_accessoriesName").val());
                    formData.append("businessRegistrationAccessories", $("#businessRegistrationAccessories").val());
                    formData.append("sparepart-firstname", $("#sparepart-firstname").val());
                    formData.append("sparepart-lastname", $("#sparepart-lastname").val());
                    formData.append("sparepart-idcard", $("#sparepart-idcard").val());
                    formData.append("sparepart-address", $("#sparepart-address").val());
                    formData.append("sparepart-provinceId", $("#sparepart-provinceId").val());
                    formData.append("sparepart-districtId", $("#sparepart-districtId").val());
                    formData.append("sparepart-subdistrictId", $("#sparepart-subdistrictId").val());
                    formData.append("sparepart-postCode", $("#sparepart-postCode").val());
                } else if (role == "4") {
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
                    url: base_url + "api/UserManagement/userTypeAndData",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function(data) {
                        if (data.message == 200) {
                            showMessage(data.message, "admin/UserManagement");
                        } else {
                            showMessage(data.message);
                        }
                    }
                });

            }
        }

        function setProvincePlate(province=null){
            var provincePlateDropdown = $("#provincePlate");
            provincePlateDropdown.append('<option value="">เลือกจังหวัด</option>');
            
            $.post(base_url + "api/Location/getProvinceforcar", {},
                function(data) {
                    var provinceforcar = data.data;
                    $.each(provinceforcar, function(index, value) {
                        if(province == value.provinceforcarId){
                            provincePlateDropdown.append('<option value="' + value.provinceforcarId + '" selected>' + value.provinceforcarName + '</option>');   
                        }else{
                            provincePlateDropdown.append('<option value="' + value.provinceforcarId + '">' + value.provinceforcarName + '</option>');                               
                        }
                    });
                }
            );
        }

        var userId = $("#userId").val();
        var category = $("#category").val();

        $.post(base_url + "api/UserManagement/getusers", {
            "userId": userId
        }, function(data) {
            if (data.message != 200) {
                showMessage(data.message, "admin/UserManagement");
            }

            if (data.message == 200) {
                var profile = data.profile;

                if(profile == null){
                    onLoad();
                    return false;
                }
                
                $("#titleName").val(profile.titleName);
                $("#firstname").val(profile.firstname);
                $("#lastname").val(profile.lastname);
                $("#phone1").val(profile.phone1);
                $("#phone2").val(profile.phone2);
                $("#provinceId").val(profile.provinceId);
                $("#districtId").val(profile.districtId);
                $("#subdistrictId").val(profile.subdistrictId);
                $("#address").val(profile.address);

                profileProvince = profile.provinceId;
                profileDistrict = profile.districtId;
                profileSubDistrict = profile.subdistrictId;
                onLoad();
                var roleData = data.role;
                $("#role option[value="+roleData+"]").attr('selected','selected');
                $("#role").imagepicker({
                    show_label: true,
                    initialized: function(imagePicker){
                        $("#role").data('1');
                    } 
                });

                var other = data.other;
                $("#role").val(roleData);
                if (roleData == 4) {
                    setProvincePlate(other.province_plate);
                    $("#mileage").val(other.mileage);
                    $("#pictureFront").val(other.pictureFront);
                    $("#pictureBack").val(other.pictureBack);
                    $("#circlePlate").val(other.circlePlate);
                    $("#characterPlate").val(other.character_plate);
                    $("#numberPlate").val(other.number_plate);
                    $("#colorCar").val(other.color);
                } else if (roleData == 3) {

                    garageProvince = other.provinceId;
                    garageDistrict = other.districtId;
                    garageSubDistrict = other.subdistrictId;

                    $("#comment").val(other.comment);
                    $("#businessRegistration").val(other.businessRegistration);
                    $("#garageName").val(other.garageName);
                    $("#garageAddress").val(other.garageAddress);
                    $("#zipCode").val(other.postCode);
                    $("#latitude").val(other.latitude);
                    $("#longtitude").val(other.longtitude);
                    $("#garageMaster").val(other.garageMaster);
                    // $("#garage-subdistrictId").val(other.subdistrictId);
                    // $("#garage-districtId").val(other.districtId);
                    // $("#garage-provinceId").val(other.province_provinceId);
                    if(other.option1 != "2"){
                        $("#box1").prop('checked', true);
                    }

                    if(other.option2 != "2"){
                        $("#box2").prop('checked', true);
                    }

                    if(other.option3 != "2"){
                        $("#box3").prop('checked', true);
                    }

                    if(other.option4 != "2"){
                        $("#box4").prop('checked', true);
                    }

                    $("#other").val(other.option_outher);
                    $("#garagePicture").val(other.garagePicture);
                    $("#firstnameGarage").val(other.firstname);
                    $("#lastnameGarage").val(other.lastname);
                    $("#idcardGarage").val(other.idcard);
                    $("#addressGarage").val(other.addressGarage);
                    $("#other").val(other.option_outher);
                } else if (roleData == 2) {

                    sparepartProvince = other.provinceId;
                    sparepartDistrict = other.districtId;
                    sparepartSubDistrict = other.subdistrictId;

                    $("#car_accessoriesName").val(other.car_accessoriesName);
                    $("#businessRegistrationAccessories").val(other.businessRegistration);
                    $("#sparepart-firstname").val(other.firstname);
                    $("#sparepart-lastname").val(other.lastname);
                    $("#sparepart-address").val(other.address);
                    $("#sparepart-idcard").val(other.idcard);
                    // $("#sparepart-provinceId").val(other.postCode);
                    // $("#sparepart-districtId").val(other.postCode);
                    // $("#sparepart-subdistrictId").val(other.postCode);
                    $("#sparepart-zipCode").val(other.postCode);
                    $("#sparepart-postCode").val(other.postCode);

                }

            }

        });

    });
   
</script>
</body>
</html>