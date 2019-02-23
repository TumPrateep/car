<script>
    $(document).ready(function () {
        
        var form = $("#update-member-form"); 
       

        var user_profile = $("#user_profile").val();
        $.post(base_url+"service/Userprofile/getuser",{
            "user_profile" : user_profile
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"public/userprofile");
            }
            if(data.message == 200){
                result = data.data;
                $("#titleName").html(result.titleName);
                $("#firstname").html(result.firstname);
                $("#lastname").html(result.lastname);
                
                $("#hno").val(result.hno);
                $("#village").val(result.village);
                $("#road").val(result.road);
                $("#alley").val(result.alley);
                $("#provinceId").val(result.provinceId);
                $("#districtId").val(result.districtId);
                $("#subdistrictId").val(result.subdistrictId);
                $("#subdistrictName").val(result.subdistrictName);
                $("#districtName").val(result.districtName);
                $("#provinceName").val(result.provinceName);
                $("#address").val("บ้านเลขที่"+result.hno+"  หมู่ที่ "+result.village+"  ถนน "+result.road+"  ซอย "+result.Alley+"  ตำบล "+result.subdistrictName+"  อำเภอ "+result.districtName+"  จังหวัด "+result.provinceName);
                
                $("#phone1").html(result.phone1);
                $("#phone2").html(result.phone2);
                loadProvinceUser(result.provinceId,result.districtId,result.subdistrictId);

            }
            
        });
        
            var provinceDropdownUser = $("#provinceId");
            provinceDropdownUser.append('<option value="">เลือกจังหวัด</option>');
            var districtDropdownUser = $('#districtId');
            districtDropdownUser.append('<option value="">เลือกอำเภอ</option>');
            var subdistrictDropdownUser = $('#subdistrictId');
            subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');

        function loadProvinceUser(provinceId, districtId,subdistrictId){
            $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
                function(data){
                var province = data.data;
                $.each(province, function( index, value ) {
                    provinceDropdownUser.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
                });
                provinceDropdownUser.val(provinceId);
                loadDistrictGarage(provinceId, districtId,subdistrictId);
                }
            );
            }
            provinceDropdownUser.change(function(){
            var provinceId = $(this).val();
            loadDistrictGarage(provinceId);
            });
            function loadDistrictGarage(provinceId, districtId,subdistrictId){
            districtDropdownUser.html("");
            districtDropdownUser.append('<option value="">เลือกอำเภอ</option>');
            subdistrictDropdownUser.html("");
            subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');
            $.post(base_url+"apiUser/LocationforRegister/getDistrict",{
                provinceId: provinceId
            },
                function(data){
                var district = data.data;
                $.each(district, function( index, value ) {
                    districtDropdownUser.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
                });
                districtDropdownUser.val(districtId);
                loadSubdistrictGarage(districtId,subdistrictId);
                }
            );
            }
            districtDropdownUser.change(function(){
            var districtId = $(this).val();
            loadSubdistrictGarage(districtId);
            });
            function loadSubdistrictGarage(districtId,subdistrictId){
            subdistrictDropdownUser.html("");
            subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');
                
            $.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
                districtId: districtId
            },
                function(data){
                var subDistrict = data.data;
                $.each(subDistrict, function( index, value ) {
                    subdistrictDropdownUser.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
                });
                subdistrictDropdownUser.val(subdistrictId);
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
        $("#submit").submit(function(){
            updateuser();
        })
        function updateuser(){
            event.preventDefault();
            var isValid = $("#submit").valid();
           
            
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);
                $.ajax({
                url: base_url+"service/Userprofile/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"public/userprofile/");
                    }else{
                        showMessage(data.message);
                    }
                }
              });
            }
        };
    });
</script>

</body>
</html>