<script>
    $("#submit").validate({
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
            car_accessoriesId: {
                required: true
            },
            price: {
                required: true
            },
            warranty_year: {
                required: true
            },
            warranty_distance: {
                required: true
            },
            can_change: {
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
            car_accessoriesId: {
                required: "กรุณากรอกร้านอะไหล่"
            },
            price: {
                required: "กรุณากรอกราคา"
            },
            warranty_year: {
                required: "กรุณากรอกการประกัน(ปี)"
            },
            warranty_distance: {
                required: "กรุณากรอกการประกัน(ระยะทาง)"
            },
            can_change: {
                required: "Fitted or Mail order"
            },
            tempImage: {
                required: "กรุณาใส่รูปล้อรถ",
                // extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            }
        },
    });

     $("#submit").submit(function(){
        tiredata();
    })

    var tire_brandId = $("#tire_brandId");
    var tire_modelId = $("#tire_modelId");
    var rimId = $("#rimId");
    var tire_sizeId = $("#tire_sizeId");
    var car_accessoriesId = $("#car_accessoriesId");
    var price = $("#price");
    var warranty_year = $("#warranty_year");
    var warranty_distance = $("#warranty_distance");
    var can_change = $("#can_change");

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

     brand.change(function(){
        var brandId = brand.val();
        model.html('<option value="">เลือกยี่ห้อยาง</option>');
        $.get(base_url+"api/tirebrands/getAllTireBrandByName",{
            brandId: brandId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    model.append('<option value="' + value.tire_brandId + '">' + value.tire_brandName + '</option>');
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
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tiresize + '</option>');
                });
            }
        );
    });

    


    function tiredata(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/CarAccessory/createBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/car");
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
        height: 122,
        type: 'image/jpeg'
        imageBackground: true,
        imageState: {
            src: 'http://lorempixel.com/500/400/' // renders an image by default
         }
    });
</script>



</body>
</html>