<script> 
    $(document).ready(function () {
    //  $.validator.setDefaults({ ignore: ":hidden:not(select)" });
    var garageId = $("#garageId").val();
     $("#update-garagesmanagement").validate({
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
            garageName: {
                required: true
            },
            phone: {
                required: true
            },
            addressGarage: {
                required: true
            },
            phone1: {
                required: true
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
            garageName: {
                required: "กรุณากรอกชื่ออู่ซ่อมรถ"
            },
            phone: {
                required: "เบอร์โทรศัพท์ร้าน"
            },
            addressGarage: {
                required: "กรุณากรอกนามสกุล"
            },
            phone1: {
                required: "กรุณากรอกเบอร์โทรศัพท์"
            }            
        },
    });

    into();

    function into(){
        $.post(base_url+"api/Garagesmanagement/getUpdate",{
            "garageId" : garageId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/garagesmanagement");
            }
            if(data.message == 200){
                result = data.data;
                $("#mechanicId").val(result.mechanicId);
                // $("#car_accessories_phone").val(result.phone);
                // $("#shop_address").val(result.provinceId+" "+result.districtId+" "+result.subdistrictId+" "+result.hno+" "+result.Alley+" "+result.road+" "+result.village);
                $("#titleName").val(result.titleName);
                $("#firstname").val(result.firstName);
                $("#lastname").val(result.lastName);
                $("#phone1").val(result.mechanicphone);

                $("#garageName").val(result.garageName);
                $("#phone").val(result.phone);
                $("#hno").val(result.hno);
                $("#alley").val(result.alley);
                $("#road").val(result.road);
                $("#village").val(result.village);
                $("#latitude").val(result.latitude);
                $("#longtitude").val(result.longtitude);
                loadProvinceGarage(result.provinceId,result.districtId,result.subdistrictId);
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

    // $("#update-garagesmanagement").submit(function (e) { 
    //     e.preventDefault();
    //     $(this).valid();
    // });
    $("#update-garagesmanagement").submit(function(event){
        event.preventDefault();
        updateModel();
    })

    function updateModel(){
            var isValid = $("#update-garagesmanagement").valid();
            if(isValid){
                var data = $("#update-garagesmanagement").serialize();
                $.post(base_url+"api/Garagesmanagement/update",data,
                function(data){
                    var garageId = $("#garageId").val();
                    if(data.message == 200){
                        showMessage(data.message,"admin/garagesmanagement");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }
});
</script>

