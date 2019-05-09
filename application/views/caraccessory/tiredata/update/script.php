<script>
    $("#update-tiredata").validate({
        rules: {
            tire_brandId: {
                required: true
            },
            tire_modelId: {
                required: true
            },
            rimId: {
                required: true
            },
            tire_sizeId: {
                required: true
            },
            price: {
                required: true
            },
            can_change:{
                required: true
            }
        },
        messages: {
            tire_brandId: {
                required: "กรุณากรอกยี่ห้อยาง"
            },
            tire_modelId: {
                required: "กรุณากรอกรุ่นยาง"
            },
            rimId: {
                required: "กรุณากรอกขอบยาง"
            },
            tire_sizeId: {
                required: "กรุณากรอกขนาดยาง"
            },
            price: {
                required: "กรุณากรอกราคา",
                min: "กรอกข้อมูลไม่ถูกต้อง"
            },
            price: {
                required: "กรุณากรอกราคา"
            },
            can_change:{
                required: "กรุณาเลือก Fitted or Mail order"
            },
            warranty_distance: {
                min: "กรอกข้อมูลไม่ถูกต้อง"
            }
        }  
    });

    var tire_dataId = $("#tire_dataId").val();
    
    $.get(base_url+"apiCaraccessories/TireData/getTireData",{
        "tire_dataId": tire_dataId
    },function(data){
        if(data.message != 200){
            showMessage(data.message,"caraccessory/Tiredata");
        }else{
            result = data.data;
            console.log(result);
            init(result.tire_brandId, result.tire_modelId, result.rimId, result.tire_sizeId);
            $("#price").val(result.price);
            $("#can_change").val(result.can_change);
            if(result.warranty_year != 0){
                $("#warranty_year").val(result.warranty_year);
            }
            if(result.warranty != 0){
                $("#warranty").val(result.warranty);
            }
            if(result.warranty_distance != 0){
                $("#warranty_distance").val(result.warranty_distance);
            }
            setTirePicture(result.tire_picture);
        }
        
    });

    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_modelId");
    var tire_rim = $("#rimId");
    var tire_size = $("#tire_sizeId");

    function init(brandId,modelId,rimId,tireSizeId){
        getTireBrand(brandId, modelId);
        getRim(rimId,tireSizeId);
    }

    function getTireBrand(brandId, modelId){
        $.get(base_url+"apiCaraccessories/Tirebrand/getAllTireBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value.tire_brandName + '</option>');
                });
                tireBrand.val(brandId);
                getTireModel(modelId);
            }
        );
    }

    function getTireModel(modelId=null){
        var tireBrandId = tireBrand.val();
        $.get(base_url+"apiCaraccessories/Tiremodel/getAllTireModel",{
            tire_brandId: tireBrandId
        },function(data){
                var tireModelData = data.data;
                $.each( tireModelData, function( key, value ) {
                    tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName + '</option>');
                });
                tireModel.val(modelId);
            }
        );
    }

    tireBrand.change(function(){
        tireModel.html('<option value="">เลือกรุ่นยาง</option>');
        getTireModel();
    });

    function getRim(rimId,tireSizeId){
        $.get(base_url+"apiCaraccessories/TireRim/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
                tire_rim.val(rimId);
                getTireSize(tireSizeId);
            }
        );
    }

    function getTireSize(tireSizeId = null){
        var tire_rimId = tire_rim.val();
        $.get(base_url+"apiCaraccessories/Tiresize/getAllTireSize",{
            tire_rimId: tire_rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                });
                tire_size.val(tireSizeId);
            }
        );
    }  

    tire_rim.change(function(){
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        getTireSize();
    });

    function setTirePicture(tirePicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image/jpeg',
            imageState: {
                src: picturePath+"tirebranddata/"+tirePicture
            }
        });
    }

     $("#update-tiredata").submit(function(){
        updateTireData();
    })

    function updateTireData(){
        event.preventDefault();
        var isValid = $("#update-tiredata").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-tiredata");
            var formData = new FormData(myform);
            
            $.ajax({
                url: base_url+"apiCaraccessories/TireData/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/Tiredata");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
</script>

</body>
</html>