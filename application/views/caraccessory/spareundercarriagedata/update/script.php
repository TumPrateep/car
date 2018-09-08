<script>
   $("#update-sparesUndercarriageData").validate({
        rules: {
            spares_undercarriageId: {
                required: true
            },
            spares_brandId: {
                required: true
            },
            price: {
                required: true
            }
        },
        messages: {
            spares_undercarriageId: {
                required: "กรุณาเลือกอะไหล่ช่วงล่าง"
            },
            spares_brandId: {
                required: "กรุณาเลือกยี่ห้ออะไหล่"
            },
            price: {
                required: "กรุณากรอกราคา"
            }
        },
    });
    
    
    var spares_undercarriageDataId = $("#spares_undercarriageDateId");
    var spares_undercarriage = $("#spares_undercarriageId");
    var spares_brand = $("#spares_brandId");
    var brand = $("#brandId");
    var model = $("#modelId");
    var modelofcar = $("#modelofcarId");

    getSparesUndercarriageData();

    function getSparesUndercarriageData(){
        $.get(base_url+"apiCaraccessories/SpareundercarriageData/getSpareUndercarriageData",{
            "spares_undercarriageDataId":spares_undercarriageDataId.val()
        },function(data){
                var sparesUndercarriageData = data.data;
                $("#price").val(sparesUndercarriageData.price);
                $("#warranty_year").val(sparesUndercarriageData.warranty_year);
                $("#warranty").val(sparesUndercarriageData.warranty);
                $("#warranty_distance").val(sparesUndercarriageData.warranty_distance);

                $('.image-editor').cropit({
                    allowDragNDrop: false,
                    width: 200,
                    height: 200,
                    type: 'image',
                    imageState: {
                        src: picturePath+"spareundercarriage/"+sparesUndercarriageData.spares_undercarriageDataPicture
                    }
                });
                
                init(sparesUndercarriageData.brandId, sparesUndercarriageData.modelId, sparesUndercarriageData.modelofcarId);
                getSparesUndercarriage(sparesUndercarriageData.spares_undercarriageId, sparesUndercarriageData.spares_brandId);
            }
        );
    }

    function init(brandId, modelId, modelofcarId){
        // getSparesUndercarriageData();
        getBrand(brandId, modelId, modelofcarId);
    }

    function getSparesUndercarriage(spares_undercarriageId=null, spares_brandId=null){
        $.get(base_url+"apiCaraccessories/CarSpareUndercarriage/getAllSpareundercarriage",{},
            function(data){
                var sparesUndercarriageData = data.data;
                $.each(sparesUndercarriageData, function( key, value ) {
                    spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                });

                if(spares_undercarriageId != null){
                    spares_undercarriage.val(spares_undercarriageId);
                    if(spares_brandId != null){
                        getSpareBrand(spares_undercarriageId,spares_brandId);
                    }
                }
            }
        );
    }

    function getSpareBrand(spares_undercarriageId=null,spares_brandId=null){
        $.get(base_url+"apiCaraccessories/SpareBrand/getAllSpareBrand",{
            spares_undercarriageId: spares_undercarriageId
        },function(data){
                var sparesBrandData = data.data;
                $.each( sparesBrandData, function( key, value ) {
                    spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>');
                });

                if(spares_brandId != null){
                    spares_brand.val(spares_brandId);
                }
            }
        );
    }

    spares_undercarriage.change(function(){
        spares_brand.html('<option value="">เลือกยี่ห้ออะไหล่ช่วงล่าง</option>');
        var spares_undercarriageId = spares_undercarriage.val();
        getSpareBrand(spares_undercarriageId);
    });

    $("#update-sparesUndercarriageData").submit(function(){
        updatesparesUndercarriageData();
    })

    function updatesparesUndercarriageData(){
        event.preventDefault();
        var isValid = $("#update-sparesUndercarriageData").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-sparesUndercarriageData");
            var formData = new FormData(myform);
            
            $.ajax({
                url: base_url+"apiCaraccessories/SpareundercarriageData/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/SpareundercarriesData");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }

    function getBrand(brandId = null, modelId = null, modelofcarId=null){
        $.get(base_url+"api/Car/getAllBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    brand.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');
                });
                brand.val(brandId);
                getModel(brandId, modelId, modelofcarId);
            }
        );
    }

    function getModel(brandId = null,modelId = null, modelofcarId=null){
        $.get(base_url+"api/Car/getAllModel",{
            brandId: brandId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    if(value.yearEnd != null){
                        model.append('<option value="' + value.modelId + '">' + value.modelName + " ปีที่ผลิต " + value.yearStart + " - " + value.yearEnd +'</option>');
                    }else{
                        model.append('<option value="' + value.modelId + '">' + value.modelName + " ปีที่ผลิต " + value.yearStart +'</option>');
                    }
                });
                model.val(modelId);
                getModelofcar(brandId, modelId, modelofcarId);
            }
        );
    }

    function getModelofcar(brandId = null,modelId = null, modelofcarId=null){
        $.post(base_url+"apiCaraccessories/Modelofcar/getallmodelofcar",{
            "brandId": brandId,
            "modelId": modelId
        },function(data){
            var modelofcarData = data.data;
            $.each( modelofcarData, function( key, value ) {
                modelofcar.append('<option value="' + value.modelofcarId + '">' + value.modelofcarName + '</option>');
            });
            modelofcar.val(modelofcarId);
        });
    }

    brand.change(function(){
        var brandId = brand.val();
        model.html('<option value="">เลือกรุ่นรถ</option>');
        getModel(brandId);
    });

    model.change(function(){
        modelofcar.html('<option value="">เลือกรายละเอียดรุ่น</option>');
        $.get(base_url+"api/Modelofcar/getAllmodelofcar",{
            modelId: model.val()
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    if(value.machineSize != null){
                        modelofcar.append('<option value="' + value.modelofcarId + '">' + value.modelofcarName + " " + 	value.machineSize + '</option>');
                    }else{
                        modelofcar.append('<option value="' + value.modelofcarId + '">' + value.modelofcarName + '</option>');
                    }
                });
            }
        );
    });



    

</script>



</body>
</html>