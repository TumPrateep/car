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
                required: "กรุณากรอกราคา",
                min: "กรอกข้อมูลไม่ถูกต้อง"
            },
            warranty_distance: {
                min: "กรอกข้อมูลไม่ถูกต้อง"
            }

        },
    });
    
    
    var spares_undercarriageDataId = $("#spares_undercarriageDateId");
    var spares_undercarriage = $("#spares_undercarriageId");
    var spares_brand = $("#spares_brandId");
    var brand = $("#brandId");
    var model = $("#modelId");
    var detail = $("#detail");
    var modelofcar = $("#modelofcarId");
    var form = $("#update-sparesUndercarriageData");

    getSparesUndercarriageData();

    function getSparesUndercarriageData(){
        $.get(base_url+"apicaraccessories/spareundercarriagedata/getSpareUndercarriageData",{
            "spares_undercarriageDataId":spares_undercarriageDataId.val()
        },function(data){
                var sparesUndercarriageData = data.data;
                $("#price").val(sparesUndercarriageData.price);
                if(sparesUndercarriageData.warranty_year != 0){
                    $("#warranty_year").val(sparesUndercarriageData.warranty_year);
                }
                if(sparesUndercarriageData.warranty != 0){
                    $("#warranty").val(sparesUndercarriageData.warranty);
                }
                if(sparesUndercarriageData.warranty_distance != 0){
                    $("#warranty_distance").val(sparesUndercarriageData.warranty_distance);
                }
                

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

    function getSparesUndercarriage(spares_undercarriageId = null, spares_brandId = null){
        $.get(base_url+"apicaraccessories/Carspareundercarriage/getAllSpareundercarriage",{},
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
        $.get(base_url+"apicaraccessories/Sparebrand/getAllSpareBrand",{
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
                url: base_url+"apicaraccessories/Spareundercarriagedata/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/Spareundercarriesdata");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }

    function getBrand(brandId = null, modelId = null, modelofcarId = null){
        $.get(base_url+"apicaraccessories/carselect/getCarBrand",{},
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

        $.get(base_url+"apicaraccessories/carselect/getCarModel",{
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
        $.get(base_url+"apicaraccessories/carselect/getCarYear",{
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
        $.get(base_url+"apicaraccessories/carselect/getCarDetail",{
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
   
    
    // form.submit(function(){
    //     updateBrand();
    // });

    // function updateBrand(){
    //     event.preventDefault();
    //     var isValid = form.valid();
    //     if(isValid){
    //         var imageData = $('.image-editor').cropit('export');
    //         $('.hidden-image-data').val(imageData);
    //         var myform = document.getElementById("submit");
    //         var formData = new FormData(myform);
    //         $.ajax({
    //             url: base_url+"apiCaraccessories/spareundercarriagedata/update",
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             type: 'POST',
    //             success: function (data) {
    //                 if(data.message == 200){
    //                     showMessage(data.message,"car/caraccessory/SpareundercarriesData");
    //                 }else{
    //                     showMessage(data.message);
    //                 }
    //             }
    //         });
    //     }
    // }

</script>



</body>
</html>