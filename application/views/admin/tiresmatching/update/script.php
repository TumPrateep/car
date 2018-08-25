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

    var brand = $("#brandId");
    var model = $("#modelId");
    var tire_rim = $("#tire_rimId");
    var tire_size = $("#tire_sizeId");
    var tire_matchingId = $("#tire_matchingId").val();

    $.get(base_url+"api/TireMatching/getTireMatching",{
        "tire_matchingId": tire_matchingId
    },function(data){
        var result = data.data;
        if(data.message!=200){
            showMessage(data.message,"admin/Tires/tiresmatching/");
        }else{
            init(result.brandId, result.modelId, result.rimId, result.tire_sizeId);
        }
        
    });

    function init(brandId, modelId, rimId, tire_sizeId){
        getBrand(brandId, modelId);
        getRim(rimId, tire_sizeId);
    }

    function getBrand(brandId = null, modelId = null){
        $.get(base_url+"api/Car/getAllBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                });
                brand.val(brandId);
                getModel(brandId, modelId);
            }
        );
    }

    function getModel(brandId = null,modelId = null){
        $.get(base_url+"api/Car/getAllModel",{
            brandId: brandId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                });
                model.val(modelId);
            }
        );
    }

    brand.change(function(){
        var brandId = brand.val();
        model.html('<option value="">เลือกรุ่นรถ</option>');
        getModel(brandId);
    });

    function getTireSize(tire_rimId = null, tire_sizeId = null){
        $.get(base_url+"api/Triesize/getAllTireSize",{
            tire_rimId: tire_rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tiresize + '</option>');
                });

                tire_size.val(tire_sizeId);
            }
        );
    }

    tire_rim.change(function(){
        var tire_rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        getTireSize(tire_rimId);
    });

    function getRim(rimId = null, tire_sizeId = null){
        $.get(base_url+"api/Rim/getAllRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
                tire_rim.val(rimId);
                getTireSize(rimId, tire_sizeId);
            }
        );
    }

    function updateTireMatching(){
        event.preventDefault();
        var isValid = $("#update-tiresmatching").valid();
        if(isValid){
            var data = $("#update-tiresmatching").serialize();
            $.post(base_url+"api/TireMatching/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Tires/tiresmatching");
                }else{
                    showMessage(data.message,);
                }
            });        
        }
    }
</script>

</body>
</html>