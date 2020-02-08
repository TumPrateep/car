<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.date.css')?>">
<link rel="stylesheet" href="<?=base_url('public/js/datepicker/themes/default.time.css')?>">

<script src="<?=base_url('public/js/datepicker/picker.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.date.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/picker.time.js')?>"></script>
<script src="<?=base_url('public/js/datepicker/translations/th_TH.js')?>"></script>
<script>
var form_counter = 0;

function getLocation() {
    navigator.geolocation.getCurrentPosition(function(location) {
        console.log(location.coords.accuracy);
        document.getElementById("latitude").value = (location.coords.latitude);
        document.getElementById("longtitude").value = (location.coords.longitude);
    });
};
$(document).ready(function() {

    var register = $("#rigister");
    jQuery.validator.addMethod("username", function(value, element) {
        return this.optional(element) || /^[A-Za-z\d]+$/.test(value);
    }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');

    // jQuery.validator.addMethod("roles", function(value, elem, param) {
    //   return $(".roles:checkbox:checked").length > 0;
    // },"gg");

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
    }, 'เลขบัตรประชาชนให้ถูกต้อง');


    register.validate({
        rules: {
            titleName_user: {
                required: true
            },
            firstname_user: {
                required: true
            },
            lastname_user: {
                required: true
            },
            // hno_user: {
            //     required: true
            // },
            // provinceId_user: {
            //     required: true
            // },
            // districtId_user: {
            //     required: true
            // },
            // subdistrictId_user: {
            //     required: true
            // },
            // phone1: {
            //     minlength: 9,
            //     required: true
            // },
            // phone2: {
            //     minlength: 9,
            //     // required: true
            // },
            // personalid: {
            //     required: true,
            //     pid: true
            // },
            // postCode_user: {
            //     required: true
            // },
            garagename: {
                required: true
            },
            // businessRegistration: {
            //     required: true
            // },
            // phone_garage: {
            //     required: true
            // },
            // brandId: {
            //     required: true
            // },
            // timestart: {
            //     required: true
            // },
            // timeend: {
            //     required: true
            // },
            // hno_garage: {
            //     required: true
            // },
            // provinceId_garage: {
            //     required: true
            // },
            // districtId_garage: {
            //     required: true
            // },
            // subdistrictId_garage: {
            //     required: true
            // },
            // postCode_garage: {
            //     required: true
            // },
            // latitude: {
            //     required: true
            // },
            // longtitude: {
            //     required: true
            // },
            username: {
                minlength: 4,
                required: true
            },
            phone: {

                minlength: 9,
                required: true
            },
            password: {

                minlength: 6,
                required: true
            },
            checkpassword: {
                required: true,
                equalTo: "#password"
            },
            check: {
                required: true,
                minlength: 1
            },
        },
        messages: {
            titleName_user: {
                required: "คำนำหน้า"
            },
            firstname_user: {
                required: "ชื่อ"
            },
            lastname_user: {
                required: "นามสกุล"
            },
            personalid: {
                required: "รหัสบัตรประชาชน",
                pid: "รหัสบัตรประชาชนให้ถูกต้อง"
            },
            hno_user: {
                required: "บ้านเลขที่"
            },
            provinceId_user: {
                required: "จังหวัด"
            },
            districtId_user: {
                required: "อำเภอ"
            },
            subdistrictId_user: {
                required: "ตำบล"
            },
            postCode_user: {
                required: "กรุณากรอกรหัสไปรษณี"
            },
            phone1: {
                minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
                required: "เบอร์โทรศัพท์"
            },
            phone2: {
                minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว"
            },
            garagename: {
                required: "ชื่อศูนย์บริการ"
            },
            businessRegistration: {
                required: "หมายเลขทะเบียนการค้า"
            },
            phone_garage: {
                minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
                required: "เบอร์โทรศัพท์"
            },
            brandId: {
                required: "กรุณาเลือกความเชี่ยวชาญรถ"
            },
            hno_garage: {
                required: "บ้านเลขที่"
            },
            provinceId_garage: {
                required: "จังวัด"
            },
            districtId_garage: {
                required: "อำเภอ"
            },
            subdistrictId_garage: {
                required: "ตำบล"
            },
            postCode_garage: {
                required: "กรุณากรอกรหัสไปรษณี"
            },
            latitude: {
                required: "กรุุณากรอกละติจูด"
            },
            longtitude: {
                required: "ลองจิจูด"
            },
            username: {
                required: "ชื่อผู้ใช้งาน",
                minlength: "ชื่อผู้ใช้อย่างน้อย 4 ตัวอักษร"
            },
            phone: {
                minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
                required: "เบอร์โทรศัพท์"
            },
            password: {
                required: "รหัสผ่าน",
                minlength: "รหัสผ่านอย่างน้อย 6 ตัวอักษร"
            },
            checkpassword: {
                required: "รหัสผ่านอีกครั้ง",
                equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
            },
            postCode: {
                required: "รหัสไปรณี"
            },
            check: {
                required: "กรุณาเลือกการบริการ"
            }
        }
    });

    init();

    function init() {
        loadProvinceGarage();
        showForm();
        getbrand();
    }
    // user
    var provinceDropdownuser = $("#provinceId_user");
    provinceDropdownuser.append('<option value="">เลือกจังหวัด</option>');

    var districtDropdownuser = $('#districtId_user');
    districtDropdownuser.append('<option value="">เลือกอำเภอ</option>');

    var subdistrictDropdownuser = $('#subdistrictId_user');
    subdistrictDropdownuser.append('<option value="">เลือกตำบล</option>');

    //sparepart
    var provinceDropdownsparepart = $("#provinceId_garage");
    provinceDropdownsparepart.append('<option value="">เลือกจังหวัด</option>');

    var districtDropdownsparepart = $('#districtId_garage');
    districtDropdownsparepart.append('<option value="">เลือกอำเภอ</option>');

    var subdistrictDropdownsparepart = $('#subdistrictId_garage');
    subdistrictDropdownsparepart.append('<option value="">เลือกตำบล</option>');

    function loadProvinceGarage(provinceId, districtId, subdistrictId) {
        $.post(base_url + "service/Locationforregister/getProvince", {},
            function(data) {
                var province = data.data;
                $.each(province, function(index, value) {
                    provinceDropdownuser.append('<option value="' + value.provinceId + '">' + value
                        .provinceName + '</option>');
                    provinceDropdownsparepart.append('<option value="' + value.provinceId + '">' +
                        value.provinceName + '</option>');
                });
            }
        );
    }

    provinceDropdownuser.change(function() {
        var provinceId = $(this).val();
        loadDistrictGarage(provinceId);
    });

    provinceDropdownsparepart.change(function() {
        var provinceId = $(this).val();
        loadDistrictsparepart(provinceId);
    });

    function loadDistrictGarage(provinceId, districtId, subdistrictId) {
        districtDropdownuser.html("");
        districtDropdownuser.append('<option value="">เลือกอำเภอ</option>');
        subdistrictDropdownuser.html("");
        subdistrictDropdownuser.append('<option value="">เลือกตำบล</option>');

        $.post(base_url + "service/Locationforregister/getDistrict", {
                provinceId: provinceId
            },
            function(data) {
                var district = data.data;
                $.each(district, function(index, value) {
                    districtDropdownuser.append('<option value="' + value.districtId + '">' + value
                        .districtName + '</option>');
                });
            }
        );
    }

    function loadDistrictsparepart(provinceId, districtId, subdistrictId) {
        districtDropdownsparepart.html("");
        districtDropdownsparepart.append('<option value="">เลือกอำเภอ</option>');
        subdistrictDropdownsparepart.html("");
        subdistrictDropdownsparepart.append('<option value="">เลือกตำบล</option>');

        $.post(base_url + "service/Locationforregister/getDistrict", {
                provinceId: provinceId
            },
            function(data) {
                var district = data.data;
                $.each(district, function(index, value) {
                    districtDropdownsparepart.append('<option value="' + value.districtId + '">' +
                        value.districtName + '</option>');
                });
            }
        );
    }

    districtDropdownuser.change(function() {
        var districtId = $(this).val();
        loadSubdistrictGarage(districtId);
    });

    districtDropdownsparepart.change(function() {
        var districtId = $(this).val();
        loadSubdistrictsparepart(districtId);
    });

    function loadSubdistrictGarage(districtId, subdistrictId) {
        subdistrictDropdownuser.html("");
        subdistrictDropdownuser.append('<option value="">เลือกตำบล</option>');

        $.post(base_url + "service/Locationforregister/getSubdistrict", {
                districtId: districtId
            },
            function(data) {
                var subDistrict = data.data;
                $.each(subDistrict, function(index, value) {
                    subdistrictDropdownuser.append('<option value="' + value.subdistrictId + '">' +
                        value.subdistrictName + '</option>');
                });
            }
        );
    }

    function loadSubdistrictsparepart(districtId, subdistrictId) {
        subdistrictDropdownsparepart.html("");
        subdistrictDropdownsparepart.append('<option value="">เลือกตำบล</option>');

        $.post(base_url + "service/Locationforregister/getSubdistrict", {
                districtId: districtId
            },
            function(data) {
                var subDistrict = data.data;
                $.each(subDistrict, function(index, value) {
                    subdistrictDropdownsparepart.append('<option value="' + value.subdistrictId +
                        '">' + value.subdistrictName + '</option>');
                });
            }
        );
    }

    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 200,
        height: 200,
        type: 'image/jpeg'
    });

    $('#timestart').pickatime({
        format: 'HH:i',
        formatSubmit: 'HH:i:A',
        max: true,
        interval: 10,
        editable: true
    });

    $('#timeend').pickatime({
        format: 'HH:i',
        formatSubmit: 'HH:i:A',
        max: true,
        interval: 10,
        editable: true
    });

    $("#rigister").submit(function() {
        creates();
    })

    function creates() {
        event.preventDefault();
        var data = $("#rigister").serialize();
        var isValid = $("#rigister").valid();

        if (isValid) {
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("rigister");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "service/Register/garages",
                data,
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "login/");
                    } else {
                        showMessage(data.message);
                    }
                    console.log(data);
                }
            });
        }
    }

});

var brand = $("#brandId");

function getbrand() {
    brand.html('<option></option>');
    $.get(base_url + "service/Carselect/getCarBrand", {},
        function(data) {
            var brandData = data.data;
            $.each(brandData, function(key, value) {
                brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId +
                    '">' + value.brandName + '</option>').trigger("chosen:updated");
            });
        }
    );
}

function showForm() {
    var html = '<div class="row justify-content-md-center">' +
        '<div class="col-lg-2">' +
        '<button type="button" class="btn btn-main-md width-100p active" onclick="showForm()"><i class="fa fa-chevron-right" aria-hidden="true"></i> ถัดไป </button>' +
        '</div>' +
        '</div>';
    // console.log(".form-show-"+form_counter);
    $(".btn-show").hide("slow");
    $(".form-show-" + form_counter).html(html);
    $(".form-active-" + form_counter).show("slow");
    $(".form-show-" + form_counter).show("slow");
    form_counter++;
}
</script>