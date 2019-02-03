<script>
    $(document).ready(function () {
        
        var form = $("#update-member-form"); 

       
    });

        var garageId = $("#garageId").val();

        $.post(base_url+"apiGarage/Managegarage/getmanagegarage",{
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
                $("#address").val(result.hno+"  หมู่ที่"+result.village+"  ถนน"+result.road+"  ซอย"+result.alley+"  ตำบล"+result.subdistrictName+"  อำเภอ"+result.districtName+"  จังหวัด"+result.provinceName+"  รหัสไปรษณีย์"+result.postCode+"  ละติจูด"+result.latitude+"  ลองติจูด"+result.longtitude);
                $("#dateSE").val(changeStringToDay(result.dayopenhour));
                setBrandPicture(result.picture);

                // owner
                var ownerData = result.owner;
                $("#personalid").val(ownerData.personalid);
                $("#flName").val(ownerData.firstName+" "+ownerData.lastName);
                // setBrandPicture(ownerData.picture);
            }

            loadProvinceGarage(result.provinceId,result.districtId,result.subdistrictId);
            
        });


        
            var provinceDropdownGarage = $("#provinceId");
            provinceDropdownGarage.append('<option value="">เลือกจังหวัด</option>');

            var districtDropdownGarage = $('#districtId');
            districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');

            var subdistrictDropdownGarage = $('#subdistrictId');
            subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');


    //     function onLoad(){
    //    // loadProvinceUser();
        
    //     }
    //     onLoad();


        function loadProvinceGarage(provinceId, districtId,subdistrictId){
            $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
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

            $.post(base_url+"apiUser/LocationforRegister/getDistrict",{
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
                
            $.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
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
                url: base_url+"apiGarage/Managegarage/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"garage/Managegarage/");
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