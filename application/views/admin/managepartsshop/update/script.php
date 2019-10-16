<script> 
    $(document).ready(function () {
    //  $.validator.setDefaults({ ignore: ":hidden:not(select)" });
    var car_accessoriesId = $("#car_accessoriesId").val();
     $("#update-partsshop").validate({
        rules: {
            car_accessoriesName: {
                required: true
            },
            car_accessories_phone: {
                required: true
            },
            shop_address: {
                required: true
            },
            profile_firstname: {
                required: true
            },
            profile_titleName: {
                required: true
            },
            profile_lastname: {
                required: true
            },
            phone1: {
                required: true
            },

            
        },
        messages: {
            car_accessoriesName: {
                required: "กรุณากรอกชื่อร้าน"
            },
            car_accessories_phone: {
                required: "กรุณากรอกเบอร์โทรศัพท์ร้าน"
            },
            shop_address: {
              required: "กรุณากรอกที่อยู่ร้าน"  
            },
            profile_titleName: {
                required: "กรุณาเลือกคำนำหน้า"
            },
            profile_firstname: {
                required: "กรุณากรอกชื่อ"
            },
            profile_lastname: {
                required: "กรุณากรอกนามสกุล"
            },
            phone1: {
                required: "กรุณากรอกเบอร์โทรศัพท์"
            },
            
        },
    });

    into();

    function into(){
        $.post(base_url+"api/Managepartsshop/getUpdate",{
            "car_accessoriesId" : car_accessoriesId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/managepartsshop");
            }
            if(data.message == 200){
                result = data.data;
                $("#car_accessoriesName").val(result.car_accessoriesName);
                $("#car_accessories_phone").val(result.phone);
                // $("#shop_address").val(result.provinceId+" "+result.districtId+" "+result.subdistrictId+" "+result.hno+" "+result.Alley+" "+result.road+" "+result.village);
                $("#profile_titleName").val(result.titlename);
                $("#profile_firstname").val(result.firstname);
                $("#profile_lastname").val(result.lastname);
                // $("#phone1").val(result.name);
                $("#hno").val(result.hno);
                $("#alley").val(result.alley);
                $("#road").val(result.road);
                $("#village").val(result.village);
                // $("#provinceId").val(result.provinceId);
                // $("#districtId").val(result.districtId);
                // $("#subdistrictId").val(result.subdistrictId);
            }
            
        });
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

    // $("#update-partsshop").submit(function (e) { 
    //     e.preventDefault();
    //     $(this).valid();
    //     updateModel();
    // });

    $("#submit").submit(function(){
        updateModel();
    })

    function updateModel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/Managepartsshop/update",data,
                function(data){
                    var car_accessoriesId = $("#car_accessoriesId").val();
                    if(data.message == 200){
                        showMessage(data.message,"admin/managepartsshop");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }

});
</script>

</body>
</html>