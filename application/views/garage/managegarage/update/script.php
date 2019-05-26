<script>
    function getLocation() {
        navigator.geolocation.getCurrentPosition(function(location) {
          console.log(location.coords.accuracy);
          document.getElementById("latitude").value = (location.coords.latitude);
          document.getElementById("longtitude").value = (location.coords.longitude);
        });
    };

    $(document).ready(function () {
        
        var form = $("#update-member-form"); 

       
    });

        var garageId = $("#garageId").val();

        $.post(base_url+"apigarage/Managegarage/getmanagegarage",{
            "garageId" : garageId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"garage/managegarage");
            }
            if(data.message == 200){
                result = data.data;
                $("#garageName").val(result.garageName);
                $("#phone").val(result.phone);
                $("#businessRegistration").val(result.businessRegistration);
                $("#personalid").val(result.personalid);
                $("#brandId").val(result.brandId);
                $("#hno").val(result.hno);
                $("#alley").val(result.alley);
                $("#road").val(result.road);
                $("#village").val(result.village);
                $("#provinceId").val(result.provinceId);
                $("#districtId").val(result.districtId);
                $("#postCode").val(result.postCode);
                $("#subdistrictId").val(result.subdistrictId);
                $("#latitude").val(result.latitude);
                $("#longtitude").val(result.longtitude);
                $("#openingtime").val(result.openingtime);
                $("#closingtime").val(result.closingtime);
                $("#option_outher").val(result.option_outher);
                if(result.option1 == 1){
                    $('#Wifi').each(function() {
                        this.checked = true;                        
                    });
                }
                if(result.option2 == 2){
                    $('#roomfan').each(function() {
                        this.checked = true;                        
                    });
                }
                if(result.option3 == 3){
                    $('#roomAir').each(function() {
                        this.checked = true;                        
                    });
                }
                if(result.option4 == 4){
                    $('#snack').each(function() {
                        this.checked = true;                        
                    });
                }
                var dayall = result.dayopenhour;

                for(var i=0;i<7;i++){   
                    if(dayall.charAt(i) == "1" && i==0){
                        $('#monday').each(function() {this.checked = true; });
                    }else if(dayall.charAt(i) == "1" && i==1){
                        $('#tuesday').each(function() {this.checked = true; });
                    }else if(dayall.charAt(i) == "1" && i==2){
                        $('#wednesday').each(function() {this.checked = true; });
                    }else if(dayall.charAt(i) == "1" && i==3){
                        $('#thursday').each(function() {this.checked = true; });
                    }else if(dayall.charAt(i) == "1" && i==4){
                        $('#friday').each(function() {this.checked = true; });
                    }else if(dayall.charAt(i) == "1" && i==5){
                        $('#saturday').each(function() {this.checked = true; });
                    }else if(dayall.charAt(i) == "1" && i==6){
                        $('#sunday').each(function() {this.checked = true; });
                    }
                }

                var Service = result.garageService;

                for(var j=0;j<3;j++){   
                    if(Service.charAt(j) == "1" && j==0){
                        $('#change_spare').each(function() {this.checked = true; });
                    }else if(Service.charAt(j) == "1" && j==1){
                        $('#change_tire').each(function() {this.checked = true; });
                    }else if(Service.charAt(j) == "1" && j==2){
                        $('#change_lubricator').each(function() {this.checked = true; });
                    }
                }

                setBrandPicture(result.picture);
            }

            loadProvinceGarage(result.provinceId,result.districtId,result.subdistrictId);
            getBrand(result.brandId);
            
        });

        var brand = $("#brandId");

        function getBrand(brandId){
            $.get(base_url+"api/Car/getAllBrandgarage",{},
                function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                    });
                    brand.val(brandId);
                }
            );
        }
        
        var provinceDropdownGarage = $("#provinceId");
        provinceDropdownGarage.append('<option value="">เลือกจังหวัด</option>');

        var districtDropdownGarage = $('#districtId');
        districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');

        var subdistrictDropdownGarage = $('#subdistrictId');
        subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');     

        function loadProvinceGarage(provinceId, districtId,subdistrictId){
            $.post(base_url+"service/Locationforregister/getProvince",{},
                function(data){
                var province = data.data;
                $.each(province, function( index, value ) {
                    provinceDropdownGarage.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
                });

                provinceDropdownGarage.val(provinceId);
                loadDistrictGarage(provinceId, districtId,subdistrictId);
                }
            );
            }

            provinceDropdownGarage.change(function(){
            var provinceId = $(this).val();
            loadDistrictGarage(provinceId);
            });

        function loadDistrictGarage(provinceId, districtId,subdistrictId){
            districtDropdownGarage.html("");
            districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');
            subdistrictDropdownGarage.html("");
            subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');

            $.post(base_url+"service/Locationforregister/getDistrict",{
                provinceId: provinceId
            },
                function(data){
                var district = data.data;
                $.each(district, function( index, value ) {
                    districtDropdownGarage.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
                });
                districtDropdownGarage.val(districtId);
                loadSubdistrictGarage(districtId,subdistrictId);
                }
            );

            }

            districtDropdownGarage.change(function(){
            var districtId = $(this).val();
            loadSubdistrictGarage(districtId);
            });

        function loadSubdistrictGarage(districtId,subdistrictId){
            subdistrictDropdownGarage.html("");
            subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');
                
            $.post(base_url+"service/Locationforregister/getSubdistrict",{
                districtId: districtId
            },
                function(data){
                var subDistrict = data.data;
                $.each(subDistrict, function( index, value ) {
                    subdistrictDropdownGarage.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
                });
                subdistrictDropdownGarage.val(subdistrictId);
                }
            );
            }

        var letters = /^[ก-๙a-zA-Z]+$/;  
        
        jQuery.validator.addMethod("THEN", function(value, element) {
            return this.optional(element) || /^[ก-๙a-zA-Z]+$/.test(value);
        }, 'asasas');

        jQuery.validator.addMethod("NUMBERCHECK", function(value, element) {
            return this.optional(element) || /^[0-9]+$/.test(value);
        }, 'กรอกเฉพาะตัวเลข');


        $("#submit").validate({
                rules: {
                    garageName: {
                        required: true,
                        THEN: true
                    },
                    phone: {
                        required: true,
                        minlength: 9,
                        maxlength: 10
                    },
                    businessRegistration: {
                        required: true,
                        minlength: 13,
                        maxlength: 13
                    },
                    brandId: {
                        required: true
                    },
                    openingtime: {
                        required: true
                    },
                    closingtime: {
                        required: true
                    },
                    hno: {
                        // required: true
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
                    postCode: {
                        required: true
                    },
                    coordinates: {
                        required: true
                    },
                    option_outher:  {
                        THEN: true
                    },
                },
                messages: {
                    garageName: {
                        required: "กรุณากรอกชื่ออู่",
                        THEN: "กรอกข้อมูลไม่ถูกต้อง"
                    },
                    phone: {
                        required: "กรุณากรอกเบอร์โทรศัพท์",
                        minlength: "กรุณากรอกเบอร์โทรศัพท์ให้ครบ",
                        maxlength: "กรอกข้อมูลไม่ถูกต้อง",
                        min: "กรอกข้อมูลไม่ถูกต้อง"
                    },
                    businessRegistration: {
                        required: "กรุณากรอกหมายเลขทะเบียนการค้า",
                        maxlength: "กรุณากรอกตัวเลขเเค่ 13 หลัก",
                        minlength: "กรุณากรอกตัวเลขอย่างน้อย 13 หลัก",
                        min: "กรอกข้อมูลไม่ถูกต้อง"
                    },
                    brandId: {
                        required: "กรุณากรอกชื่อ"
                    },
                    openingtime: {
                        required: "กรุณาเลือกเวลา"
                    },
                    closingtime: {
                        required: "กรุณาเลือกเวลา"
                    },
                    hno: {
                        // required: "กรุณากรอกบ้านเลขที่"
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
                    postCode: {
                        required: "กรุณากรอกรหัสไปรษณีย์",
                        minlength: "กรุณากรอกรหัสไปรษณีย์อย่างน้อย 5 ตัว",
                        NUMBERCHECK: "กรุณากรอกเฉพาะตัวเลข"
                    },
                    coordinates: {
                        required: "กรุณาดึงพิกัด"
                    },
                    option_outher:  {
                        THEN: "กรอกข้อมูลไม่ถูกต้อง"
                    }
                }
        });

        function setBrandPicture(picture){
                    $('.image-editor').cropit({
                        allowDragNDrop: false,
                        width: 200,
                        height: 200,
                        type: 'image',
                        imageState: {
                            src: picturePath+"garage/"+picture
                        }
                    });
                }


        $("#submit").submit(function(){
            updategarage();
        })


        function updategarage(){
            event.preventDefault();
            var isValid = $("#submit").valid();
           
            
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);

                $.ajax({
                url: base_url+"apigarage/Managegarage/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"garage/managegarage/");
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