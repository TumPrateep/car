<script>
    
    $(document).ready(function () {
        var form = $("#submit");
        var spares_undercarriage = $("#spares_undercarriageId");
        var spares_brand = $("#spares_brandId");

        var brand =$("#brandId");
        var model = $("#modelId");
        var modelofcar = $("#modelofcarId");
        var detail = $("#detail");
        var productId = $("#productId").val();


        init();
        
        function init(){
            $.post(base_url+"api/Spareproduct/getUpdate",{
                "productId" : productId
            },function(data){
                if(data.message!=200){
                    showMessage(data.message,"admin/spareproduct");
                }
                if(data.message == 200){
                    result = data.data;
                    // $("#productId").val(result.productId);
                    // $("#spares_undercarriageId").val(result.spares_undercarriageId);
                    // $("#spares_brandId").val(result.spares_brandId);
                    // $("#brandId").val(result.brandId);
                    // $("#modelId").val(result.modelId);
                    // $("#detail").val(result.detail);
                    // $("#modelofcarId").val(result.modelofcarId);
                    // $("#status").val(result.status);
                    setBrandPicture(result.picture);
                    // $("#skill").val(result.skill);
                    getbrand(result.brandId, result.modelId, result.modelofcarId);
                    getSparesUndercarriage(result.spares_undercarriageId, result.spares_brandId);
                }
                
            });
            // initpicture();
            // getSparesUndercarriage();
            // getbrand();
        }



        function getSparesUndercarriage(spares_undercarriageId = null, spares_brandId = null){
            $.get(base_url+"api/SpareUndercarriage/getAllSpareundercarriage",{},
                function(data){
                    var sparesUndercarriageData = data.data;
                    $.each(sparesUndercarriageData, function( key, value ) {
                        spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                    });
                    spares_undercarriage.val(spares_undercarriageId);
                    getSpareBrand(spares_brandId);
                }
            );
        }

        function getSpareBrand(spares_brandId=null){
            var spares_undercarriageId = spares_undercarriage.val();
            spares_brand.html('<option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>');
            $.get(base_url+"api/SpareUndercarriage/getAllSpareBrand",{
                "spares_undercarriageId": spares_undercarriageId
            },function(data){
                    var sparesBrandData = data.data;
                    $.each( sparesBrandData, function( key, value ) {
                        spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>');
                    });
                    spares_brand.val(spares_brandId);
                }
            );
        }

        spares_undercarriage.change(function(){
            getSpareBrand();
        });

        function getbrand(brandId = null, modelId = null, modelofcarId = null){
            $.get(base_url+"api/CarSelect/getCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>');
                    });
                    brand.val(brandId);
                    getModel(modelId, modelofcarId);
                }
            );
        }

        function getModel(modelId = null, modelofcarId = null){
            var brandId = brand.val();
            model.html('<option value="">เลือกรุ่นรถ</option>');
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');

            $.get(base_url+"api/CarSelect/getCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelId + '">' + value.modelName + '</option>');
                    });
                    model.val(modelId);
                    getDetail(modelId, modelofcarId);
                }
            );
        }

        brand.change(function(){
            getModel();
        });

        function getDetail(modelId = null, modelofcarId = null){
            var modelName = $("#modelId option:selected").text();
            detail.html('<option value="">เลือกโฉมรถยนต์</option>');
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');            
            $.get(base_url+"api/CarSelect/getCarYear",{
                modelName : modelName
            },function(data){
                var detailData = data.data;
                $.each( detailData, function( key, value ) {
                    detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>');
                });
                detail.val(modelId);
                getModelOfcar(modelofcarId);
            });
        }

        model.change(function(){
            getDetail();
        });

        function getModelOfcar(modelofcarId=null){
            modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
            $.get(base_url+"api/CarSelect/getCarDetail",{
                modelId : detail.val()
            },function(data){
                var carModelData = data.data;
                $.each( carModelData, function( key, value ) {
                    modelofcar.append('<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>');
                });
                modelofcar.val(modelofcarId);
            });
        }
        
        detail.change(function(){
            getModelOfcar();
        });

        function initpicture(){
            $('.image-editor').cropit({
                allowDragNDrop: false,
                width: 200,
                height: 200,
                type: 'image/jpeg'
            });
        }

        function setBrandPicture(picture){
                    $('.image-editor').cropit({
                        allowDragNDrop: false,
                        width: 200,
                        height: 200,
                        type: 'image',
                        imageState: {
                            src: picturePath+"spareproduct/"+picture
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
                    url: base_url+"api/Spareproduct/update",
                    data: formData,
                    processData: false,
                    contentType: false,
                    type: 'POST',
                    success: function (data) {
                        if(data.message == 200){
                            showMessage(data.message,"admin/spareproduct");
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
