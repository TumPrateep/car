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
    
        init();
        
        function init(){
            initpicture();
            getTireBrand();
            getRim();
        }

        function getTireBrand(brandId = null){
        $.get(base_url+"api/Tireproduct/getAllTireBrand",{},
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
        $.get(base_url+"api/Tireproduct/getAllTireModel",{
            tire_brandId: tireBrandId
        },function(data){
                var tireModelData = data.data;
                $.each( tireModelData, function( key, value ) {
                    tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName + '</option>');
                });
            }
        );
    });

    function getRim(rimId = null){
        $.get(base_url+"api/Tireproduct/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
            }
        );
    }

    tire_rim.change(function(){
        var rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"api/Tireproduct/getAllTireSize",{
            rimId: rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                });
            }
        );
    });

    function getbrand(brandId = null ){
            $.get(base_url+"api/CarSelect/getCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });
                }
            );
        }

        brand.change(function(){
            var brandId = brand.val();
            model.html('<option value="">เลือกรุ่นรถ</option>');
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            // year.html('<option value="">เลือกปีผลิต</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"api/CarSelect/getCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                    });
                }
            );
        });

        model.change(function(){
            var modelName = $("#modelId option:selected").text();
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            // year.html('<option value="">เลือกปีผลิต</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');            
            $.get(base_url+"api/CarSelect/getCarYear",{
                modelName : modelName
            },function(data){
                var detailData = data.data;
                $.each( detailData, function( key, value ) {
                    detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>');
                });
            });
        });
        
        detail.change(function(){
            // var modelId = model.val();
            // var detail = $("#detail").val();
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"api/CarSelect/getCarDetail",{
                modelId : detail.val()
            },function(data){
                var carModelData = data.data;
                console.log(carModelData);
                $.each( carModelData, function( key, value ) {
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
                });
            });
        });
        
        function initpicture(){
            $('.image-editor').cropit({
                allowDragNDrop: false,
                width: 200,
                height: 200,
                type: 'image/jpeg'
            });
        }

        form.submit(function(){
            createBrand();
        });

        function createBrand(){
            event.preventDefault();
            var isValid = form.valid();
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);
                $.ajax({
                    url: base_url+"api/Tireproduct/create",
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
