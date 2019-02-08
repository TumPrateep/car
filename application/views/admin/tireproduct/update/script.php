<script>
    
    $(document).ready(function () {
        var form = $("#submit");
        var tireBrand = $("#tire_brandId");
        var tireModel = $("#tire_seriesId");
        var tire_rim = $("#rimId");
        var tire_size = $("#tire_sizeId");

        var brand =$("#brandId");
        var model = $("#modelId");
        var modelofcar = $("#modelofcarId");
        var detail = $("#detail");
        var productId = $("#productId").val();
    
        init();
        
        function init(){
            getUpdate();
        }

        function getUpdate(){
            $.post(base_url+"api/Tireproduct/getUpdate",{
                "productId" : productId
            },function(data){
                if(data.message!=200){
                    showMessage(data.message,"admin/tireproduct");
                }
                if(data.message == 200){
                    result = data.data;
                    // $("#productId").val(result.productId);
                    // $("#tire_brandId").val(result.tire_brandId);
                    // $("#tire_modelId").val(result.tire_modelId);
                    // $("#rimId").val(result.rimId);
                    // $("#tire_sizeId").val(result.tire_sizeId);
                    // $("#status").val(result.status);
                    initpicture(result.picture);

                    getTireBrand(result.tire_brandId, result.tire_modelId);
                    getRim(result.rimId, result.tire_sizeId);
                    
                }
                
            });
        }

        function getTireBrand(brandId = null, modelId=null){
            $.get(base_url+"api/Tireproduct/getAllTireBrand",{},
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

        function getTireModel(modelId = null){
            var tireBrandId = tireBrand.val();
            tireModel.html('<option value="">เลือกรุ่นยาง</option>');
            $.get(base_url+"api/Tireproduct/getAllTireModel",{
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
            getTireModel();
        });

        function getRim(rimId = null, tire_sizeId = null){
            $.get(base_url+"api/Tireproduct/getAllTireRims",{},
                function(data){
                    var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                    });
                    tire_rim.val(rimId);
                    getTireSize(tire_sizeId);
                }
            );
        }

        function getTireSize(tire_sizeId = null){
            var rimId = tire_rim.val();
            tire_size.html('<option value="">เลือกขนาดยาง</option>');
            $.get(base_url+"api/Tireproduct/getAllTireSize",{
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

        tire_rim.change(function(){
            getTireSize();
        });
        
        function initpicture(picture){
            $('.image-editor').cropit({
                allowDragNDrop: false,
                width: 200,
                height: 200,
                type: 'image/jpeg',
                imageState: {
                    src: picturePath+"tireproduct/"+picture
                }
            });
        }

        form.submit(function(){
            updateBrand();
        });

        function updateBrand(){
            event.preventDefault();
            var isValid = form.valid();
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);
                $.ajax({
                    url: base_url+"api/Tireproduct/update",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        if(data.message == 200){
                            showMessage(data.message,"admin/tireproduct");
                        }else{
                            showMessage(data.message);
                        }
                    }
                });
            }
        }


        function updateBrand(){
            event.preventDefault();
            var isValid = form.valid();
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);
                $.ajax({
                    url: base_url+"api/Tireproduct/update",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        if(data.message == 200){
                            showMessage(data.message,"admin/tireproduct");
                        }else{
                            showMessage(data.message);
                        }
                    }
                });
            }
        }

    });

    

</script>

</body>
</html>
