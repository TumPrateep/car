<script>
$(document).ready(function() {
    var brand = $("#brandId");
    var modelOfCar = $('#modelId');
    var model = $("#model_name");
    var year = $("#year");
    var modelofcar = $("#modelofcarId");

    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_modelId");
    var tire_rim = $("#rimId");
    var tire_size = $("#tire_sizeId");

    focus('tire-search');

    $("#car-search").validate({
        rules: {
            brandId: {
                required: true
            },
            model_name: {
                required: true
            },
            year: {
                required: true
            },
            modelofcarId: {
                required: true
            }
        },
        messages: {
            brandId: {
                required: "เลือกยี่ห้อรถ"
            },
            model_name: {
                required: "เลือกรุ่นรถ"
            },
            year: {
                required: "เลือกปีที่ผลิต"
            },
            modelofcarId: {
                required: "เลือกรายละเอียดรุ่น"
            }
        },
    });

    init();

    function init() {
        getbrand();
        getTireBrand();
        getRim();
    }

    function clearCarData() {
        brand.val('');
        model.val('');
        year.val('');
        modelofcar.val('');
    }

    function clearTireData() {
        tireBrand.val('');
        tireModel.val('');
        tire_rim.val('');
        tire_size.val('');
    }

    function getbrand() {
        clearTireData();
        brand.html('<option value="">ยี่ห้อรถ</option>');
        model.html('<option value="">รุ่นรถ</option>');
        year.html('<option value="">ปีที่ผลิต</option>');
        modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
        $.get(base_url + "service/Carselect/getActiveCarBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value
                        .brandId + '">' + value.brandName + '</option>');
                });
                clearTireData();
            }
        );
    }

    brand.change(function() {
        getModel();
        clearTireData();
    });

    function getModel(carprofile = null) {
        var brandId = brand.val();
        model.html('<option value="">รุ่นรถ</option>');
        year.html('<option value="">ปีที่ผลิต</option>');
        modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
        $.get(base_url + "service/Carselect/getActiveCarModel", {
            brandId: brandId
        }, function(data) {
            var modelData = data.data;
            $.each(modelData, function(key, value) {
                model.append('<option value="' + value.modelName + '">' + value.modelName +
                    '</option>');
            });
            clearTireData();
        });
    }

    model.change(function() {
        getYear();
    });

    function getYear() {
        var brandId = brand.val();
        var modelName = $("#model_name option:selected").text();
        year.html('<option value="">ปีที่ผลิต</option>');
        modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
        $.get(base_url + "service/Carselect/getMaxMinYear", {
            modelName: modelName
        }, function(data) {
            $("#car_type").val(data.car_type);
            if (!data.max) {
                data.max = data.min;
            }
            for (let i = data.max; i >= data.min; i--) {
                year.append('<option value="' + i + '">' + i + '</option>');
            }
            showDetail();
            clearTireData();

        });
    }

    function showDetail() {
        var car_type = $('#car_type').val();
        console.log(car_type);
        if (car_type == '1') {
            $("#show-detail").hide();
        } else {
            $("#show-detail").show();
            modelOfCar.html('<option value="">ข้อมูลเพิ่มเติม</option>');
        }
    }

    year.change(function() {
        var car_type = $('#car_type').val();
        if (car_type == '1') {
            getModelOfCar();
        } else {
            getDetailOfCar();
        }
    });

    function getDetailOfCar() {
        modelOfCar.html('<option value="">ข้อมูลเพิ่มเติม</option>');
        $.get(base_url + "service/Carselect/getModelByYear", {
            brandId: brand.val(),
            modelName: $("#model_name option:selected").text(),
            year: year.val()
        }, function(data) {
            var carModelData = data.data;
            $.each(carModelData, function(key, value) {
                modelOfCar.append('<option value="' + value.modelId + '">' + value.detail +
                    '</option>');
            });
            clearTireData();
        })
    }

    modelOfCar.change(function() {
        getModelOfCarByModelId();
    });

    function getModelOfCarByModelId() {
        modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
        $.get(base_url + "service/Carselect/getModelOfCarByModelId", {
            modelId: modelOfCar.val()
        }, function(data) {
            var carModelData = data.data;
            // console.log(carModelData);
            var html = '';
            $.each(carModelData, function(key, value) {
                let modelofcarName = (value.modelofcarName) ? value.modelofcarName : '';
                modelofcar.append('<option value="' + value.modelofcarId + '">' + value
                    .machineSize + ' ' + modelofcarName + '</option>');
            });
            clearTireData();
        });
    }

    function getModelOfCar() {
        modelofcar.html('<option value="">รายละเอียดรุ่น</option>');
        $.get(base_url + "service/Carselect/getModelOfCarByYear", {
            brandId: brand.val(),
            modelName: $("#model_name option:selected").text(),
            year: year.val()
        }, function(data) {
            var carModelData = data.data;
            // console.log(carModelData);
            var html = '';
            $.each(carModelData, function(key, value) {
                let modelofcarName = (value.modelofcarName) ? value.modelofcarName : '';
                modelofcar.append('<option value="' + value.modelofcarId + '">' + value
                    .machineSize + ' ' + modelofcarName + '</option>');
            });
            clearTireData();
        });
    }

    $('#car-search').submit(function(e) {
        e.preventDefault();
        var isvalid = $(this).valid();
        if (isvalid) {
            window.location.href = base_url + 'products/tire?' + $(this).serialize();
        }
    });


    // --------------- tire ----------------------

    $("#tire-search").validate({
        rules: {
            tire_brandId: {
                required: true
            },
            rimId: {
                required: true
            }
        },
        messages: {
            tire_brandId: {
                required: "เลือกยี่ห้อยาง"
            },
            rimId: {
                required: "เลือกขอบยาง"
            }
        },
    });

    function getTireBrand() {
        tireBrand.html('<option value="">ยี่ห้อยาง</option>');
        tireModel.html('<option value="">รุ่นยาง</option>');
        $.get(base_url + "service/Tire/getAllTireBrand", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value
                        .tire_brandName + '</option>');
                });
                clearCarData();
            }
        );
    }

    tireBrand.change(function() {
        getTireModel();
    });

    function getTireModel() {
        var tireBrandId = tireBrand.val();
        tireModel.html('<option value="">รุ่นยาง</option>');
        $.get(base_url + "service/Tire/getAllTireModel", {
            tire_brandId: tireBrandId
        }, function(data) {
            var tireModelData = data.data;
            $.each(tireModelData, function(key, value) {
                tireModel.append('<option value="' + value.tire_modelId + '">' + value
                    .tire_modelName + '</option>');
            });
            clearCarData();
        });
    }

    function getRim() {
        tire_rim.html('<option value="">ขอบยาง</option>');
        tire_size.html('<option value="">ขนาดยาง</option>');
        $.get(base_url + "service/Tire/getAllTireRims", {},
            function(data) {
                var brandData = data.data;
                $.each(brandData, function(key, value) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName +
                        ' นิ้ว</option>');
                });
                clearCarData();
            }
        );
    }

    tire_rim.change(function() {
        getTireSize();
    });

    function getTireSize() {
        var rimId = tire_rim.val();
        tire_size.html('<option value="">ขนาดยาง</option>');
        $.get(base_url + "service/Tire/getAllTireSize", {
            rimId: rimId
        }, function(data) {
            var brandData = data.data;
            $.each(brandData, function(key, value) {
                tire_size.append('<option value="' + value.tire_sizeId + '">' + value
                    .tire_size + '</option>');
            });
            clearCarData();
        });
    }

    $('#tire-search').submit(function(e) {
        e.preventDefault();
        var isvalid = $(this).valid();
        if (isvalid) {
            window.location.href = base_url + 'products/tire?' + $(this).serialize();
        }
    });

});
</script>