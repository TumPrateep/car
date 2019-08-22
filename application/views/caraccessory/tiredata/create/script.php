<script>
    var arrsize = [];
    $.validator.setDefaults({ ignore: ":hidden:not(select)" });
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
            "price[]": {
                required: true
            }
            // can_change:{
            //     required: true
            // },
            // tempImage: {
            //     required: true
            // }
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
            "price[]": {
                required: "กรุณากรอกราคา",
                min: "กรอกข้อมูลไม่ถูกต้อง"
            }
            // tempImage: {
            //     required: "",
            //     // extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            // },
            // price: {
            //     required: "กรุณากรอกราคา"
            // },
            // can_change:{
            //     required: "กรุณาเลือก Fitted or Mail order"
            // },
            // warranty_distance: {
            //     min: "กรอกข้อมูลไม่ถูกต้อง"
            // }
        },
    });

    $("#create-tiredata").submit(function(){
        tiredata();
    })

    function tiredata(){
        event.preventDefault();
        var isValid = $("#create-tiredata").valid();
        
        if(isValid){
            $.post(base_url+"apicaraccessories/Tiredata/create", {
                "tireBrandId" : $("#tire_brandId option:selected").val(),
                "tireModelId" : $("#tire_modelId option:selected").val(),
                "rimId" : $("#rimId option:selected").val(),
                "tireSizeId" : $("#tire_sizeId").val(),
                "price": $("input[name='price[]']").map(function(){return $(this).val();}).get(),
                "warranty_year": $("#warranty_year").val(),
                "warranty": $("input[name='warranty[]']").map(function(){return $(this).val();}).get(),
                "warranty_distance": $("input[name='warranty_distance[]']").map(function(){return $(this).val();}).get()
            },function (data, textStatus, jqXHR) {
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/tiredata");
                }else{
                    showMessage(data.message);
                } 
            });
            // var imageData = $('.image-editor').cropit('export');
            // $('.hidden-image-data').val(imageData);
            // var myform = document.getElementById("create-tiredata");
            // var formData = new FormData(myform);
            // $.ajax({
            //     url: base_url+"apicaraccessories/Tiredata/create",
            //     data: formData,
            //     processData: false,
            //     contentType: false,
            //     type: 'POST',
            //     success: function (data) {
            //         if(data.message == 200){
            //             showMessage(data.message,"caraccessory/tiredata");
            //         }else{
            //             showMessage(data.message);
            //         }
            //     }
            // });
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
        tireBrand.html('<option></option>');
        $.get(base_url+"apicaraccessories/Tirebrand/getAllTireBrand",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tireBrand.append('<option value="' + value.tire_brandId + '">' + value.tire_brandName + '</option>').trigger("chosen:updated");
                });
            }
        );
    }

    tireBrand.change(function(){
        var tireBrandId = tireBrand.val();
        tireModel.html('<option></option>');
        $.get(base_url+"apicaraccessories/Tiremodel/getAllTireModel",{
            tire_brandId: tireBrandId
        },function(data){
                var tireModelData = data.data;
                $.each( tireModelData, function( key, value ) {
                    tireModel.append('<option value="' + value.tire_modelId + '">' + value.tire_modelName + '</option>').trigger("chosen:updated");
                });
            }
        );
    });

    tire_rim.change(function(){
        var tire_rimId = tire_rim.val();
        tire_size.html('<option></option>');
        $.get(base_url+"apicaraccessories/Tiresize/getAllTireSize",{
            tire_rimId: tire_rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    arrsize[value.tire_sizeId] = value.tire_size;
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>').trigger("chosen:updated");
                });
            }
        );
    });

    function getRim(rimId = null){
        tire_rim.html('<option></option>');
        $.get(base_url+"apicaraccessories/Tirerim/getAllTireRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>').trigger("chosen:updated");
                });
            }
        );
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

    $("#show_price").click(function(){
        event.preventDefault();
        $("#renderPrice").html("");
        var isValid = $("#create-tiredata").valid();
        if(isValid){
            var tireBrandName = $("#tire_brandId option:selected").text();
            var tireModelName = $("#tire_modelId option:selected").text();
            var tire_size_val = tire_size.val();
    
            $.each(tire_size_val, function (i, v) { 
                // $.each(modelofcar_val, function (i, v) {
                    renderPrice(tireBrandName+" "+tireModelName+" "+arrsize[v]);
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
        html += '<strong>'+cardata+'</strong>'
                +'<div class="row p-t-20">'
                    +'<div class="col-md-3">'
                        +'<div class="form-group">'
                            +'<label class="control-label">ราคา</label><span class="error">*</span> <label id="price[]-error" class="error" for="price[]"></label>'
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

</script>



</body>
</html>