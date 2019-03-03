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


    var spares_changeId = $("#spares_changeId");

  

    function getUpdate(){
        $.get(base_url+"api/SpareChange/getUpdate",{"spares_changeId": spares_changeId.val()},
            function(data){
                var spareData = data.data;
                $("#spares_undercarriageId").val(spareData.spares_undercarriageId);
                $("#spares_price").val(spareData.spares_price);
                $("#brandId").val(spareData.brandId);
            }
        );
    }

    init();

    // var tire_changeId = $("#tire_changeId").val();
    $("#submit").submit(function(){
        updatespareChange();
    })


    function updatespareChange(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/SpareChange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Charge/SpareCharge/");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }

    
    setBrand();

    function setBrand(brand=null){
        var brandDropdown = $("#brandId");
            brandDropdown.append('<option value="">เลือกยี่ห้อรถ</option>');
            
            $.post(base_url + "apiGarage/Spareschange/getBrand", {},
                function(data) {
                    var Brand = data.data;
                    $.each(Brand, function(index, value) {
                        if(brand == value.brandId){
                            brandDropdown.append('<option value="' + value.brandId + '" selected>' + value.brandName + '</option>');   
                        }else{
                            brandDropdown.append('<option value="' + value.brandId + '">' + value.brandName + '</option>');                               
                        }
                    });
                }
            );
        }

    

</script>