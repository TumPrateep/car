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

    function init(){
        getTireBrand();
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

</script>



</body>
</html>