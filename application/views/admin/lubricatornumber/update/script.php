<script>
    var lubricatorTypeId = $("#lubricator_typeId");
    var lubricatorGear = $("#lubricator_gear");
    var lubricator_numberId = $("#lubricator_numberId").val();
    var lubricatorNumber = $("#lubricator_number");

    $.post(base_url+"api/lubricatortype/getAllLubricatorType",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    lubricatorTypeId.append('<option value="' + value.lubricator_typeId + '">' + value.lubricator_typeName + '</option>');
                });
            }
            getLubricatornumber();
        }
    );

    function getLubricatornumber(){
        $.post(base_url+"api/LubricatorNumber/getLubricatorNumber",{
            "lubricator_numberId": lubricator_numberId,
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/lubricatortype");
            }else{
                result = data.data;
                lubricatorNumber.val(result.lubricator_number);
                lubricatorGear.val(result.lubricator_gear);
                lubricatorTypeId.val(result.lubricator_typeId);
            }
            checkLubricatorGear();
        });
    }

    jQuery.validator.addMethod("hasGear", function(value, element) {
        var gearType = lubricatorGear.val();
        if(gearType != "1"){
            return true;
        }else{
            if(value != ""){
                return true;
            }else{
                return false;
            }
        }
    }, 'กรุณาเลือกประเภทน้ำมันเครื่อง');

    $("#update-lubricatornumber").validate({
        rules: {
            lubricator_number: {
                required: true
            },
            lubricator_typeId: {
                hasGear: true
            },
        },
        messages: {
            lubricator_number: {
                required: "กรุณากรอกเบอร์น้ำมันเครื่อง"
            },
        },
    });

    lubricatorGear.change(function(){
        checkLubricatorGear();
    });

    function checkLubricatorGear(){
        var gearType = lubricatorGear.val();
        if(gearType != "1"){
            lubricatorTypeId.prop('disabled', 'disabled');
            lubricatorTypeId.val("");
            lubricatorTypeId.removeClass('error');
            $("#update-lubricatornumber").valid();
        }else{
            lubricatorTypeId.prop('disabled', false);
        }
    }

    $("#update-lubricatornumber").submit(function(){
        updateLubricatorNumber();
    });

    function updateLubricatorNumber(){
        event.preventDefault();
        var isValid = $("#update-lubricatornumber").valid();
        if(isValid){
            var data = $("#update-lubricatornumber").serialize();
            $.post(base_url+"api/LubricatorNumber/updateLubricatorNumber",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatornumber");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>

</body>
</html>