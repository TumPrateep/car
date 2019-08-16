<script>
    $("#submit").validate({
        rules: {
            spares_price: {
                required: true
            },
            spares_undercarriageId: {
                required: true
            }
        },
        messages: {
            spares_price: {
                required: "กรอกราคาค่าบริการ"
            },
            spares_undercarriageId: {
                required: "เลือกรายการอะไหล่ช่วงล่าง"
            }
        },
    });

    var sparePartCar = $("#spares_undercarriageId");

    function init(){
        $.get(base_url+"api/sparechange/getAllSparespartcarUndercarriage",{
            "brandId" : $("#brandId").val()
        },function(data){
            var html = "";
            $.each( data, function( key, value ) {
                html += '<div class="form-group row">'
                    +'<div class="col-md-5">'
                        if(key == 0) { 
                            html +='<label>รายการอะไหล่ช่วงล่าง</label> <span class="error">*</span>' 
                        }
                        html+='<select class="form-control" name="spares_undercarriageId[]" readonly>'
                            +'<option value="'+value.spares_undercarriageId+'">'+value.spares_undercarriageName+'</option>'
                        +'</select>'
                    +'</div>'
                    +'<div class="col-md-4">'
                        if(key == 0) { 
                            html+='<label>ราคาค่าบริการ</label> <span class="error">*</span>' 
                        }
                        html+='<input type="number" class="form-control" placeholder="ราคาค่าบริการ" name="spares_price[]" value="'+value.spares_price+'" required>'
                    +'</div>'
                    +'</div>'
            });
            $("#render").html(html);
        });
    }

    init();

    $("#submit").submit(function(){
        createSpareCharge();
    })

    function createSpareCharge(){
        event.preventDefault();
        var brandId = $("#brandId").val();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Sparechange/createSparechange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/sparecharge/"+brandId);
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }

    // setBrand();

    // function setBrand(brand=null){
    //     var brandDropdown = $("#brandId");
    //         brandDropdown.append('<option value="">เลือกยี่ห้อรถ</option>');
            
    //         $.post(base_url + "apigarage/Spareschange/getBrand", {},
    //             function(data) {
    //                 var Brand = data.data;
    //                 $.each(Brand, function(index, value) {
    //                     if(brand == value.brandId){
    //                         brandDropdown.append('<option value="' + value.brandId + '" selected>' + value.brandName + '</option>');   
    //                     }else{
    //                         brandDropdown.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');                               
    //                     }
    //                 });
    //             }
    //         );
    //     }
</script>