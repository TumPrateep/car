<script src="<?=base_url("/public/js/jquery.cropit.js")?>"></script>

<script>
$(document).ready(function() {

    var form = $("#submit");

    form.validate({
        rules: {
            character_plate: {
                required: true
            },
            number_plate: {
                required: true,
                min: true
            },
            province_plate: {
                required: true
            },
            brandId: {
                required: true
            },
            modelId: {
                required: true
            },
            detail: {
                required: true
            },
            color: {
                required: true
            },
            tempImage1: {
                required: true
            }
        },
        messages: {
            character_plate: {
                required: "กรุณากรอกอัษร"
            },
            number_plate: {
                required: "กรุณากรอกหมายเลข",
                min: "กรุณากรอกหมายเลขให้ถูกต้อง",
                number: "กรุณากรอกหมายเลขให้ถูกต้อง"
            },
            province_plate: {
                required: "กรุณาเลือกจังหวัด"
            },
            brandId: {
                required: "กรุณาเลือกยี่ห้อรถ"
            },
            modelId: {
                required: "กรุณาเลือกรุ่นรถ"
            },
            detail: {
                required: "กรุณาเลือกรายละเอียดรถ"
            },
            color: {
                required: "กรุณากรอกสีรถ"
            },
            tempImage1: {
                required: "เลือกไฟล์รูปภาพ"
            },
            tempImage2: {
                required: "เลือกไฟล์รูปภาพ"
            },
            tempImage3: {
                required: "เลือกไฟล์รูปภาพ"
            }
        }
    });


    form.submit(function() {
        createcarprofile();
    })

    function createcarprofile() {
        event.preventDefault();
        var data = $("#submit").serialize();
        var isValid = form.valid();

        if (isValid) {
            var imageData = $('.image-editor-front').cropit('export');
            $('.hidden-image-front').val(imageData);
            var imageData = $('.image-editor-back').cropit('export');
            $('.hidden-image-back').val(imageData);
            var imageData = $('.image-editor-form').cropit('export');
            $('.hidden-image-form').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url + "service/Carprofile/createCarProfile",
                data,
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data) {
                    if (data.message == 200) {
                        showMessage(data.message, "user/carprofile");
                    } else {
                        showMessage(data.message);
                    }
                    console.log(data);
                }
            });
        }
    }

    $('.image-editor-front').cropit({
        allowDragNDrop: false,
        width: 350,
        height: 350,
        type: 'image/jpeg'
    });

    $('.image-editor-back').cropit({
        allowDragNDrop: false,
        width: 350,
        height: 350,
        type: 'image/jpeg'
    });

    $('.image-editor-form').cropit({
        allowDragNDrop: false,
        width: 600,
        height: 300,
        type: 'image/jpeg'
    });

    var brand = $("#brandId");
    var model = $("#modelId");
    var modelofcar = $("#modelofcarId");
    var year = $("#yearStart");
    var YearEnd = $("#YearEnd");
    var detail = $("#detail");
    var modelName = $("modelName");
    var modelId = $("modelId");

    function onLoad() {
        setProvincePlate();
        getbrand();
    }
    onLoad();

    function getbrand(brandId = null) {
        $.get(base_url + "service/Carselect/getCarBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    brand.append('<option value="' + value
                        .brandId + '">' + value.brandName + '</option>');
                });
            }
        );
    }

    brand.change(function() {
        var brandId = brand.val();
        model.html('<option value="">เลือกรุ่นรถ</option>');
        detail.html('<option value="">เลือกโฉมรถยนต์</option>');
        // year.html('<option value="">เลือกปีผลิต</option>');
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url + "service/Carselect/getCarModel", {
            brandId: brandId
        }, function(data) {
            var modelData = data.data;
            $.each(modelData, function(key, value) {
                model.append('<option value="' + value.modelId + '">' + value
                    .modelName + '</option>');
            });
        });
    });

    model.change(function() {
        var modelName = $("#modelId option:selected").text();
        detail.html('<option value="">เลือกโฉมรถยนต์</option>');
        // year.html('<option value="">เลือกปีผลิต</option>');
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url + "service/Carselect/getCarYear", {
            modelName: modelName
        }, function(data) {
            var detailData = data.data;
            $.each(detailData, function(key, value) {
                detail.append('<option value="' + value.modelId + '">' + '(ปี ' + value
                    .yearStart + '-' + value.yearEnd + ') ' + value.detail +
                    '</option>');
            });
        });
    });

    function setProvincePlate(province = null) {
        var provincePlateDropdown = $("#province_plate");
        provincePlateDropdown.append('<option value="">เลือกจังหวัด</option>');

        $.post(base_url + "service/Location/getProvinceforcar", {},
            function(data) {
                var provinceforcar = data.data;
                $.each(provinceforcar, function(index, value) {
                    if (province == value.provinceforcarId) {
                        provincePlateDropdown.append('<option value="' + value.provinceforcarId +
                            '" selected>' + value.provinceforcarName + '</option>');
                    } else {
                        provincePlateDropdown.append('<option value="' + value.provinceforcarId +
                            '">' + value.provinceforcarName + '</option>');
                    }
                });
            }
        );
    }

});
</script>