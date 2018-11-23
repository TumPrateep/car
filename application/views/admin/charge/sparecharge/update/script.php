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
    var spares_changeId = $("#spares_changeId");

    function init(){
        $.get(base_url+"api/SpareUndercarriage/getAllSparespartcarUndercarriage",{},
            function(data){
                var spareData = data.data;
                $.each( spareData, function( key, value ) {
                    sparePartCar.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
                });
                getUpdate();
            }
        );

    }

    function getUpdate(){
        $.get(base_url+"api/SpareChange/getUpdate",{"spares_changeId": spares_changeId.val()},
            function(data){
                var spareData = data.data;
                $("#spares_undercarriageId").val(spareData.spares_undercarriageId);
                $("#spares_price").val(spareData.spares_price);
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

    

</script>