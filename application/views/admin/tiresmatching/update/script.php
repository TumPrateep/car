<script>
   $("#update-tiresmatching").validate({
        rules: {
            brandId: {
                required: true
            },
            modelId: {
                required: true
            },
            tire_rimId: {
                required: true
            },
            tire_sizeId: {
                required: true
            }
        },
        messages: {
            brandId: {
                required: "กรุณาเลือกยี่ห้อรถ"
            },
            modelId: {
                required: "กรุณาเลือกรุ่นรถ"
            },
            tire_rimId: {
                required: "กรุณาเลือกขอบยาง"
            },
            tire_sizeId: {
                required: "กรุณาเลือกขนาดยาง"
            }
        },
    });

    $("#update-tiresmatching").submit(function(){
        updateTireMatching();
    })

    // var brand = $("#brandId");
    // var model = $("#modelId");
    // var tire_rim = $("#tire_rimId");
    // var tire_size = $("#tire_sizeId");
    var tire_matchingId = $("#tire_matchingId").val();
    // var modelofcar = $("#modelofcarId");

    var model = $("#modelId");
    var tire_rim = $("#tire_rimId");
    var tire_size = $("#tire_sizeId");
    var spares_undercarriage = $("#spares_undercarriageId");
    var spares_brand = $("#spares_brandId");
    var brand =$("#brandId");
    var modelofcar = $("#modelofcarId");
    var year = $("#yearStart");
    var YearEnd = $("#YearEnd");
    var detail = $("#detail");
    var modelName = $("modelName");
    var modelId = $("modelId");


    $.get(base_url+"api/Tirematching/getTireMatching",{
        "tire_matchingId": tire_matchingId
    },function(data){
        var result = data.data;
        if(data.message!=200){
            showMessage(data.message,"admin/tires/tiresmatching/");
        }else{
            init(result.brandId, result.modelId, result.rimId, result.tire_sizeId, result.modelofcarId, result.modelName);
        }
        
    });

    function init(brandId, modelId, rimId, tire_sizeId, modelofcarId, modelName){
        getBrand(brandId, modelId, modelofcarId, modelName);
        getRim(rimId, tire_sizeId);
    }

    function getBrand(brandId = null,modelId = null, modelofcarId = null, modelName = null){
        brand.html('<option value="">เลือกยี่ห้อรถ</option>');
        model.html('<option value="">เลือกรุ่นรถ</option>');
        detail.html('<option value="">เลือกโฉมรถยนต์</option>');
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url+"service/Carselect/getCarBrand",{},
        function(data){
            var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                });
                brand.val(brandId);
                getModel(brandId, modelId, modelofcarId, modelName);
            }
        );
    }

    brand.change(function(){
        getModel();
    });

    function getModel(brandId = null,modelId = null, modelofcarId = null, modelName = null){
        var brandId = brand.val();
        
        model.html('<option value="">เลือกรุ่นรถ</option>');
        detail.html('<option value="">เลือกโฉมรถยนต์</option>');
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url+"service/Carselect/getCarModel",{
            brandId : brandId
        },function(data){
            var modelData = data.data;
                $.each( modelData, function( key, value ) {
                    model.append('<option value="' + value.modelName + '">' + value.modelName + '</option>');
                });
                model.val(modelName);
                getDetail(brandId, modelId, modelofcarId);
            }
        );
    }

    model.change(function(){
        getDetail();
    });

    function getDetail(brandId = null,modelId = null, modelofcarId = null){
        var modelName = $("#modelId option:selected").text();
        detail.html('<option value="">เลือกโฉมรถยนต์</option>');
        // year.html('<option value="">เลือกปีผลิต</option>');
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');            
        $.get(base_url+"service/Carselect/getCarYear",{
            modelName : modelName
        },function(data){
            var detailData = data.data;
            $.each( detailData, function( key, value ) {
                detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>');
            });
            detail.val(modelId);
            getModelOfCar(brandId, modelId, modelofcarId);
        });
    }

    detail.change(function(){
        getModelOfCar();
    });

    function getModelOfCar(brandId = null,modelId = null, modelofcarId = null){
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url+"service/Carselect/getCarDetail",{
            modelId : detail.val()
        },function(data){
            var carModelData = data.data;
            console.log(carModelData);
            $.each( carModelData, function( key, value ) {
                modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
            });
            modelofcar.val(modelofcarId);

        });
    }

    function getRim(rimId = null,tire_sizeId = null){
        $.get(base_url+"service/Tire/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
                tire_rim.val(rimId);
                tiresize(rimId,tire_sizeId);
            }
        );
    }

    tire_rim.change(function(){
        tiresize();
    });

    function tiresize(rimId = null,tire_sizeId = null){
        var rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"service/Tire/getAllTireSize",{
            rimId: rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                });
                tire_size.val(tire_sizeId);
            }
        );
    }

    function updateTireMatching(){
        event.preventDefault();
        var isValid = $("#update-tiresmatching").valid();
        if(isValid){
            var data = $("#update-tiresmatching").serialize();
            $.post(base_url+"api/Tirematching/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/tires/tiresmatching");
                }else{
                    showMessage(data.message,);
                }
            });        
        }
    }
</script>

</body>
</html>