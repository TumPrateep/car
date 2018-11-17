<script>
   $("#create-tiresmatching").validate({
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

    $("#create-tiresmatching").submit(function(){
        createTireMatching();
    })

    var brand = $("#brandId");
    var model = $("#modelId");
    var tire_rim = $("#tire_rimId");
    var tire_size = $("#tire_sizeId");
    var modelofcar = $("#modelofcarId");

    function init(){
        getBrand();
        getRim();
    }

    function getBrand(brandId = null){
        $.get(base_url+"api/Car/getAllBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                });
            }
        );
    }

    brand.change(function(){
        var brandId = brand.val();
        model.html('<option value="">เลือกรุ่นรถ</option>');
        $.get(base_url+"api/Car/getAllModel",{
            brandId: brandId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                });
            }
        );
    });

    model.change(function(){
        modelofcar.html('<option value="">เลือกโมเดลรถ</option>');
        $.get(base_url+"api/Modelofcar/getAllmodelofcar",{
            modelId: model.val()
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    modelofcar.append('<option value="' + value.modelofcarId + '">' + value.modelofcarName + '</option>');
                });
            }
        );
    });

    tire_rim.change(function(){
        var tire_rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"api/Triesize/getAllTireSize",{
            tire_rimId: tire_rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                });
            }
        );
    });

    function getRim(rimId = null){
        $.get(base_url+"api/Rim/getAllRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
            }
        );
    }

    init();

    function createTireMatching(){
        event.preventDefault();
        var isValid = $("#create-tiresmatching").valid();
        if(isValid){
            var data = $("#create-tiresmatching").serialize();
            $.post(base_url+"api/TireMatching/create",data,
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