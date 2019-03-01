<script>
    $("#submit").validate({
        rules: {
            brandId: {
                required: "กรอกยี่ห้อรถ"
            },spares_price: {
                required: true
            },
            spares_undercarriageId: {
                required: true
            }
        },
        messages: {
            brandId: {
                required: "กรอกยี่ห้อรถ"
            },spares_price: {
                required: "กรอกราคาค่าบริการ"
            },
            spares_undercarriageId: {
                required: "เลือกรายการอะไหล่ช่วงล่าง"
            }
        },
    });

    var sparePartCar = $("#spares_undercarriageId");

    function init(){
        $.get(base_url+"api/SpareUndercarriage/getAllSparespartcarUndercarriage",{},
            function(data){
                var spareData = data.data;
                $.each( spareData, function( key, value ) {
                    sparePartCar.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                });
            }
        );
    }

    init();

    $("#submit").submit(function(){
        createSpareCharge();
    })

    function createSpareCharge(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiGarage/Spareschange/createLubricatorchangegarage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/charge/spares");
                }else{
                    showMessage(data.message,);
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