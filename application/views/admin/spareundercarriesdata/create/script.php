<script> 

    $(document).ready(function () {
        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
        $("#create-sparematching").validate({
            rules: {
                "spares_undercarriage_id[]": {
                    required: true
                },
                spares_brand_id: {
                    required: true   
                } ,
                spares_modelId: {
                    required: true   
                } ,
                brandId: {
                    required: true   
                } ,
                modelId: {
                    required: true   
                } ,
                detail: {
                    required: true   
                }  ,
                "modelofcarId[]": {
                    required: true   
                } 
            },
            messages: {
                "spares_undercarriage_id[]": {
                    required: "กรุณาเลือกรายการอะไหล่ช่วงล่าง"
                },
                spares_brand_id: {
                    required: "กรุณาเลือกยี่ห้ออะไหล่"
                },
                spares_modelId: {
                    required: "กรุณาเลือกรุ่นอะไหล่"
                },
                brandId: {
                    required: "กรุณาเลือกยี่ห้อรถ"
                },
                modelId: {
                    required: "กรุณาเลือกรุ่นรถ"
                },
                detail: {
                    required: "กรุณาเลือกปีผลิต"
                },
                "modelofcarId[]": {
                    required: "กรุณาเลือกรายละเอียดรุ่น"
                }
            },
        });

    
        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });

        $('.form-control-chosen-required').chosen({
            allow_single_deselect: false,
            width: '100%'
        });

        // init id
        var spares_undercarriage = $("#spares_undercarriage_id");
        var spares_brand = $("#spares_brand_id");
        var brand =$("#brandId");
        var model = $("#modelId");
        var modelofcar = $("#modelofcarId");
        var detail = $("#detail");

        init();

        function init(){
            getSparesUndercarriage();
            getSparesBrand();
            getbrand();
        }

        function getSparesUndercarriage(){
            spares_undercarriage.html('<option></option>').trigger("chosen:updated");
            $.get(base_url+"api/Spareundercarriage/getAllSpareundercarriage",{},
                function(data){
                    var sparesUndercarriageData = data.data;
                    $.each(sparesUndercarriageData, function( key, value ) {
                        spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>').trigger("chosen:updated");
                    });
                }
            );
        }

        function getSparesBrand(){
            spares_brand.html('<option></option>');
            $.get(base_url+"api/Spareundercarriage/getAllSpareBrand",
                function (data, textStatus, jqXHR) {
                    var spareData = data.data;
                    $.each(spareData, function (i, v) { 
                        spares_brand.append('<option value="'+v.spares_brandId+'">'+v.spares_brandName+'</option>').trigger("chosen:updated");  
                    });
                }
            );
        }

        function getbrand(carprofile = null){
            brand.html('<option></option>');
            model.html('<option></option>');
            detail.html('<option></option>');
            modelofcar.html('<option></option>');
            $.get(base_url+"service/Carselect/getActiveCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        brand.append('<option data-thumbnail="images/icon-chrome.png" value="' + value.brandId + '">' + value.brandName + '</option>').trigger("chosen:updated");
                    });

                    if(carprofile != null){
                        brand.val(carprofile.brandId);
                        getModel(carprofile);
                    }
                }
            );
        }

        brand.change(function(){
            getModel();
        });

        function getModel(carprofile = null){
            var brandId = brand.val();
            model.html('<option></option>').trigger("chosen:updated");;
            detail.html('<option></option>').trigger("chosen:updated");;
            modelofcar.html('<option></option>').trigger("chosen:updated");;
            $.get(base_url+"service/Carselect/getActiveCarModel",{
                brandId : brandId
            },function(data){
                var modelData = data.data;
                    $.each( modelData, function( key, value ) {
                        model.append('<option value="' + value.modelName + '">' + value.modelName + '</option>').trigger("chosen:updated");
                    });

                    if(carprofile != null){
                        model.val(carprofile.detail);
                        getDetail(carprofile);
                    }
                }
            );
        }

        model.change(function(){
            getDetail();
        });

        function getDetail(carprofile = null){
            var brandId = brand.val();
            var modelName = $("#modelId option:selected").text();
            detail.html('<option></option>').trigger("chosen:updated");;
            // year.html('<option value="">เลือกปีผลิต</option>');
            modelofcar.html('<option></option>').trigger("chosen:updated");;            
            $.get(base_url+"service/Carselect/getActiveCarYear",{
                modelName : modelName
            },function(data){
                var detailData = data.data;
                $.each( detailData, function( key, value ) {
                    detail.append('<option value="' + value.modelId+'">'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'</option>').trigger("chosen:updated");
                });

                if(carprofile != null){
                    detail.val(carprofile.modelId);
                    getModelOfCar(carprofile);
                }
            });
        }
        
        detail.change(function(){
            getModelOfCar();
        });

        function getModelOfCar(carprofile = null){
            modelofcar.html('<option></option>').trigger("chosen:updated");;
            $.post(base_url+"service/Carselect/getMultiCarDetail",{
                modelId : detail.val()
            },function(data){
                var carModelData = data.data;
                // console.log(carModelData);
                var tempModelId = null;
                var html  = '';
                $.each( carModelData, function( key, value ) {
                    if(value.modelId != tempModelId){
                        html += '<optgroup label="'+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail+'">';
                        tempModelId = value.modelId;
                    }
                    html += '<option value="' + value.modelofcarId+'">' + value.machineSize + ' '+ value.modelofcarName +'</option>';
                    if(value.modelId != tempModelId){
                        html += '</optgroup>';
                    }
                });
                if(carModelData.lenght > 0){
                    html += '</optgroup>';
                }
                // console.log(html);
                modelofcar.append(html).trigger("chosen:updated");
                
                if(carprofile != null){
                    modelofcar.val(carprofile.modelofcarId);
                    // table.ajax.reload();
                }
            });
        }

        $("#create-sparematching").submit(function (e) { 
            e.preventDefault();
            createSparesMatching();
        });

        function createSparesMatching(){
            event.preventDefault();
            var isValid = $("#create-sparematching").valid();
            if(isValid){
                var data = $("#create-sparematching").serialize();
                $.post(base_url+"api/Sparesmatching/create", data,
                    function (data, textStatus, jqXHR) {
                        if(data.message == 200){
                            showMessage(data.message,"admin/spareundercarriesdata");
                        }else{
                            showMessage(data.message);
                        }   
                    }
                );
            }
        }

    });

</script>

</body>
</html>