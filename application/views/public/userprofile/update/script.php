<script>
$(document).ready(function() {

    var form = $("#update-member-form");

    var user_profile = $("#user_profile").val();
    $.post(base_url + "service/Userprofile/getuser", {
        "user_profile": user_profile
    }, function(data) {
        if (data.message != 200) {
            showMessage(data.message, "public/userprofile");
        }
        if (data.message == 200) {
            result = data.data;
            $("#titleName").val(result.titleName);
            $("#firstname").val(result.firstname);
            $("#lastname").val(result.lastname);
            $("#hno").val(result.hno);
            $("#village").val(result.village);
            $("#road").val(result.road);
            $("#Alley").val(result.Alley);
            $("#provinceId").val(result.provinceId);
            $("#districtId").val(result.districtId);
            $("#subdistrictId").val(result.subdistrictId);
            $("#postCodes").val(result.postCodes);
            $("#phone1").val(result.phone1);
            $("#phone2").val(result.phone2);
            loadProvinceUser(result.provinceId, result.districtId, result.subdistrictId);
        }

    });

    var provinceDropdownUser = $("#provinceId");
    provinceDropdownUser.append('<option value="">เลือกจังหวัด</option>');
    var districtDropdownUser = $('#districtId');
    districtDropdownUser.append('<option value="">เลือกอำเภอ</option>');
    var subdistrictDropdownUser = $('#subdistrictId');
    subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');

    function loadProvinceUser(provinceId, districtId, subdistrictId) {
        $.post(base_url + "service/Locationforregister/getProvince", {},
            function(data) {
                var province = data.data;
                $.each(province, function(index, value) {
                    provinceDropdownUser.append('<option value="' + value.provinceId + '">' + value.provinceName + '</option>');
                });
                provinceDropdownUser.val(provinceId);
                loadDistrictGarage(provinceId, districtId, subdistrictId);
            }
        );
    }
    provinceDropdownUser.change(function() {
        var provinceId = $(this).val();
        loadDistrictGarage(provinceId);
    });

    function loadDistrictGarage(provinceId, districtId, subdistrictId) {
        districtDropdownUser.html("");
        districtDropdownUser.append('<option value="">เลือกอำเภอ</option>');
        subdistrictDropdownUser.html("");
        subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');
        $.post(base_url + "service/Locationforregister/getDistrict", {
                provinceId: provinceId
            },
            function(data) {
                var district = data.data;
                $.each(district, function(index, value) {
                    districtDropdownUser.append('<option value="' + value.districtId + '">' + value.districtName + '</option>');
                });
                districtDropdownUser.val(districtId);
                loadSubdistrictGarage(districtId, subdistrictId);
            }
        );
    }
    districtDropdownUser.change(function() {
        var districtId = $(this).val();
        loadSubdistrictGarage(districtId);
    });

    function loadSubdistrictGarage(districtId, subdistrictId) {
        subdistrictDropdownUser.html("");
        subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');

        $.post(base_url + "service/Locationforregister/getSubdistrict", {
                districtId: districtId
            },
            function(data) {
                var subDistrict = data.data;
                $.each(subDistrict, function(index, value) {
                    subdistrictDropdownUser.append('<option value="' + value.subdistrictId + '">' + value.subdistrictName + '</option>');
                });
                subdistrictDropdownUser.val(subdistrictId);
            }
        );
    }
    $("#submit").validate({
        rules: {
            firstName: {
                required: true
            },
            lastname: {
                required: true
            },
            hno: {
                required: true
            },
            village: {
                required: true
            },
            road: {
                required: true
            },
            Alley: {
                required: true
            },
            provinceId: {
                required: true
            },
            districtId: {
                required: true
            },
            postCodes: {
                required: true
            },
            phone1: {
                required: true
            },
            phone2: {
                required: true
            }
        },
        messages: {
            firstName: {
                required: "กรุณากรอกชื่อ"
            },
            lastname: {
                required: "กรุณากรอกนามสกุล"
            },
            hno: {
                required: "กรุณากรอกบ้านเลขที่"
            },
            village: {
                required: "กรุณากรอกหมู่ที่"
            },
            road: {
                required: "กรุณากรอกถนน"
            },
            Alley: {
                required: "กรุณากรอกซอย"
            },
            provinceId: {
                required: "กรุณากรอกจังหวัด"
            },
            districtId: {
                required: "กรุณากรอกอำเภอ"
            },
            subdistrictId: {
                required: "กรุณากรอกตำบล"
            },
            postCodes: {
                required: "กรุณากรอกรหัสไปรษณีย์",
                min: "กรอกข้อมูลไม่ถูกต้อง"
            },
            phone1: {
                required: "กรุณากรอกเบอร์โทรศัพท์",
                min: "กรอกข้อมูลไม่ถูกต้อง"
            },
            phone2: {
                required: "กรุณากรอกเบอร์โทรศัพท์ที่สามารถติดต่อได้",
                min: "กรอกข้อมูลไม่ถูกต้อง"
            }
        }
    });
    $("#submit").submit(function() {
        updateuser();
    })


    function updateuser() {
        event.preventDefault();
        var isValid = $("#submit").valid();

        if (isValid) {
            var data = $("#submit").serialize();
            $.post(base_url + "service/Userprofile/update", data,
                function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "public/userprofile/");
                    } else {
                        showMessage(data.message);
                    }
                });

        }
    };


});
</script>
</body>
</html>