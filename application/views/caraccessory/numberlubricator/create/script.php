<script>
    var lubricatorTypeId = $("#lubricator_typeId");
    var lubricatorGear = $("#lubricator_gear");

    $.post(base_url+"api/Lubricatortype/getAllLubricatorType",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    lubricatorTypeId.append('<option value="' + value.lubricator_typeId + '">' + value.lubricator_typeName + '</option>');
                });
            }
        }
    );

    lubricatorGear.change(function(){
        var gearType = $(this).val();
        if(gearType != "1"){
            lubricatorTypeId.prop('disabled', 'disabled');
            lubricatorTypeId.val("");
            lubricatorTypeId.removeClass('error');
            $("#create-lubricatornumber").valid();
        }else{
            lubricatorTypeId.prop('disabled', false);
        }
    });

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

    $("#submit").validate({
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

    $("#submit").submit(function(){
        createlubricatornumber();
    });

    function createlubricatornumber(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/lubricatornumber/createLubricatorNumber",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/numberLubricator");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>