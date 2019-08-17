<script>
    
    $(document).ready(function () {
        var form = $("#submit");
        var spares_undercarriage = $("#spares_undercarriageId");
        var spares_brand = $("#spares_brandId");

        var brand =$("#brandId");
        var model = $("#modelId");
        var modelofcar = $("#modelofcarId");
        var detail = $("#detail");

        var arrspares = [];
        var arrspares_brand = [];
        var arrbrand = [];
        var arrmodel = [];
        var arrmodelofcar = [];


        init();
        
        
        function init(){
            // initpicture();
            getSparesUndercarriage();
            getbrand();
            getSparesBrand();
        }

        function getSparesUndercarriage(){
            arrspares_brand = []
            spares_undercarriage.html('<option></option>').trigger("chosen:updated");
            $.get(base_url+"api/Spareundercarriage/getAllSpareundercarriage",{},
                function(data){
                    var sparesUndercarriageData = data.data;
                    $.each(sparesUndercarriageData, function( key, value ) {
                        arrspares[value.spares_undercarriageId] = value.spares_undercarriageName;
                        spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>').trigger("chosen:updated");
                    });
                }
            );
        }

        function getSparesBrand(){
            spares_brand.html('<option></option>').trigger("chosen:updated");
            $.get(base_url+"api/Spareundercarriage/getAllSpareBrand",{},function(data){
                    var sparesBrandData = data.data;
                    $.each( sparesBrandData, function( key, value ) {
                        arrspares_brand[value.spares_brandId] = value.spares_brandName;
                        spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>').trigger("chosen:updated");
                    });
                }
            );
        };

        function getbrand(carprofile = null){
            brand.html('<option></option>');
            model.html('<option></option>');
            detail.html('<option></option>');
            modelofcar.html('<option></option>');
            $.get(base_url+"service/Carselect/getActiveCarBrand",{},
            function(data){
                var brandData = data.data;
                    $.each( brandData, function( key, value ) {
                        arrbrand[value.brandId] = value.brandName;
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
                    arrmodel[value.modelId] = arrbrand[brandId] + " " + modelName+" "+'(ปี ' + value.yearStart + '-'+value.yearEnd+') '+value.detail;
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
                console.log(carModelData);
                var tempModelId = null;
                var html  = '';
                $.each( carModelData, function( key, value ) {
                    arrmodelofcar[value.modelofcarId] = arrmodel[value.modelId] + ' ' + value.machineSize + ' '+ value.modelofcarName;
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
                console.log(html);
                modelofcar.append(html).trigger("chosen:updated");
                
                if(carprofile != null){
                    modelofcar.val(carprofile.modelofcarId);
                    // table.ajax.reload();
                }
            });
        }

        $("#create-sparesUndercarriageData").submit(function(){
            createBrand();
        })
        function createBrand(){
            event.preventDefault();
            var isValid = $("#create-sparesUndercarriageData").valid();
            if(isValid){
                // var imageData = $('.image-editor').cropit('export');
                // $('.hidden-image-data').val(imageData);
                // var myform = document.getElementById("create-sparesUndercarriageData");
                // var formData = new FormData(myform);
                $.post(base_url+"apicaraccessories/spareundercarriagedata/create", {
                    "spares_undercarriageId": $("#spares_undercarriageId").val(),
                    "spares_brandId": $("#spares_brandId").val(),
                    "brandId": $("#brandId").val(),
                    "modelId": $("#modelId").val(),
                    "detail": $("#detail").val(),
                    "modelofcarId": $("#modelofcarId").val(),
                    "price": $("input[name='price[]']").map(function(){return $(this).val();}).get(),
                    "warranty_year": $("#warranty_year").val(),
                    "warranty": $("input[name='warranty[]']").map(function(){return $(this).val();}).get(),
                    "warranty_distance": $("input[name='warranty_distance[]']").map(function(){return $(this).val();}).get()
                },function (data, textStatus, jqXHR) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/spareundercarriesdata");
                    }else{
                        showMessage(data.message);
                    }   
                });
            }
        }

        $('.form-control-chosen-required').chosen({
            allow_single_deselect: false,
            width: '100%'
        });

        $('.form-control-chosen').chosen({
            allow_single_deselect: true,
            width: '100%'
        });

        $('.form-control-chosen-optgroup').chosen({
            allow_single_deselect: true,
            include_group_label_in_selected:true,
            width: '100%'
        });
        
        $.validator.setDefaults({ ignore: ":hidden:not(select)" });
        $("#create-sparesUndercarriageData").validate({
            rules: {
                spares_undercarriageId: {
                    required: true
                },
                brandId: {
                    required: true
                },
                modelId: {
                    required: true
                },
                detail: {
                    required: true
                },
                modelofcarId: {
                    required: true
                },
                spares_brandId: {
                    required: true
                },
                "price[]": {
                    required: true
                }
            },
            messages: {
                spares_undercarriageId: {
                    required: "เลือกอะไหล่ช่วงล่าง"
                },
                spares_brandId: {
                    required: "เลือกยี่ห้ออะไหล่"
                },
                brandId: {
                    required: "เลือกยี่ห้อรถยนต์"
                },
                modelId: {
                    required: "เลือกรุ่นรถยนต์"
                },
                detail: {
                    required: "เลือกโฉมรถยนต์"
                },
                modelofcarId: {
                    required: "เลือกรายละเอียดรุ่นรถ"
                },
                "price[]": {
                    required: "กรอกราคา",
                    min: "กรอกข้อมูลไม่ถูกต้อง"
                },
                warranty_distance: {
                    min: "ข้อมูลไม่ถูกต้อง"
                }

            },
        });

        $("#show_price").click(function(){
            event.preventDefault();
            $("#renderPrice").html("");
            var isValid = $("#create-sparesUndercarriageData").valid();
            if(isValid){
                var spare_val = spares_undercarriage.val();
                var sparebrand_val = spares_brand.val();
                var modelofcar_val = modelofcar.val();
                $.each(spare_val, function (i, v) { 
                    // $.each(modelofcar_val, function (i, v) {
                        renderPrice(arrspares[v]+" "+arrspares_brand[sparebrand_val]);
                    // });
                });

                var html = '<div class="row p-t-20">'
                    +'<div class="col-md-12 card-grid">'
                        +'<button type="submit" class="btn btn-success"> <i class="fa fa-check"></i> บันทึก</button> '
                        +'<a href="'+base_url+'caraccessory/spareundercarriesdata">'
                        +'<button type="button" class="btn btn-inverse"><i class="fa fa-close"></i> ยกเลิก</button>'
                        +'</a>'
                    +'</div>'
                +'</div>'

                $("#renderPrice").append(html);
                
                // console.log($("#modelofcarId option:selected").text());
            }
        });

        function renderPrice(cardata){
            var html = "";
            html += cardata
                    +'<div class="row p-t-20">'
                        +'<div class="col-md-3">'
                            +'<div class="form-group">'
                                +'<label class="control-label">ราคา</label><span class="error">*</span> <label id="price-error" class="error" for="price"></label>'
                                +'<div class="input-group input-group-default">'
                                    +'<input type="number" class="form-control" name="price[]" placeholder="ราคา"  min="0" required>'
                                +'</div>'
                            +'</div>'
                        +'</div> '
                        +'<div class="col-md-3">'
                            +'<div class="form-group">'
                                +'<label class="control-label">การรับประกัน-ปี</label>'
                                +'<div class="input-group input-group-default">'
                                    +'<select class="form-control" name="warranty_year[]">'
                                        +'<option value="">เลือกการรับประกัน-ปี</option>'
                                        +'<option value="1">1 ปี</option>'
                                        +'<option value="2">2 ปี</option>'
                                        +'<option value="3">3 ปี</option>'
                                        +'<option value="4">4 ปี</option>'
                                        +'<option value="5">5 ปี</option>'
                                    +'</select>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        +'<div class="col-md-3">'
                            +'<div class="form-group">'
                                +'<label class="control-label">เงื่อนไข</label>'
                                +'<div class="input-group input-group-default">'
                                    +'<select class="form-control" name="warranty[]">'
                                        +'<option value="">เลือกเงื่อนไข</option>'
                                        +'<option value="1">และ</option>'
                                        +'<option value="2">หรือ</option>'
                                    +'</select>'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                        +'<div class="col-md-3">'
                            +'<div class="form-group">'
                                +'<label class="control-label">การรับประกัน-ระยะทาง</label>'
                                +'<div class="input-group input-group-default">'
                                    +'<input type="number" class="form-control" name="warranty_distance[]" placeholder="ระยะทาง (กิโลเมตร)"  min="0">'
                                +'</div>'
                            +'</div>'
                        +'</div>'
                    +'</div><hr/>';
            $("#renderPrice").append(html);
        }

    });

    

</script>

</body>
</html>
