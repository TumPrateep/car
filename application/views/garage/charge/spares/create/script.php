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
</script>