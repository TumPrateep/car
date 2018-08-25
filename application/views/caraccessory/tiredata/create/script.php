<script>
    $("#create-tiredata").validate({
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
            },
            tempImage: {
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
                required: "กรุณากรอกราคา"
            },
            tempImage: {
                required: "",
                // extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            },
            price: {
                required: "กรุณากรอกราคา"
            },
            can_change:{
                required: "กรุณาเลือก Fitted or Mail order"
            }
        },
    });

    $("#create-tiredata").submit(function(){
        tiredata();
    })

    function tiredata(){
        event.preventDefault();
        var isValid = $("#create-tiredata").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-tiredata");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/TireData/create",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/tiredata");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
    
    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 200,
        height: 200,
        type: 'image/jpeg'
        // imageBackground: true,
        // imageState: {
        //     src: 'http://lorempixel.com/500/400/' // renders an image by default
        // }
    });

    var tireBrand = $("#tire_brandId");
    var tireModel = $("#tire_modelId");
    var tire_rim = $("#rimId");
    var tire_size = $("#tire_sizeId");

    function init(){
        getTireBrand();
        getRim();
    }
    
    init();

    function getTireBrand(brandId = null){
        $.get(base_url+"apiCaraccessories/Tirebrand/getAllTireBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value.tire_brandName + '</option>');
                });
            }
        );
    }

    tireBrand.change(function(){
        var tireBrandId = tireBrand.val();
        tireModel.html('<option value="">เลือกรุ่นยาง</option>');
        $.get(base_url+"apiCaraccessories/Tiremodel/getAllTireModel",{
            tire_brandId: tireBrandId
        },function(data){
                var tireModelData = data.data;
                $.each( tireModelData, function( key, value ) {
                    tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName + '</option>');
                });
            }
        );
    });

    tire_rim.change(function(){
        var tire_rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"apiCaraccessories/Tiresize/getAllTireSize",{
            tire_rimId: tire_rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tiresize + '</option>');
                });
            }
        );
    });

    function getRim(rimId = null){
        $.get(base_url+"apiCaraccessories/TireRim/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
            }
        );
    }



</script>



</body>
</html>