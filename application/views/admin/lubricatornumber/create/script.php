<script>
    var lubricatorTypeId = $("#lubricator_typeId");
    var lubricatorGear = $("#lubricator_gear");

    $.post(base_url+"api/lubricatortype/getAllLubricatorType",{},
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
        }else{
            lubricatorTypeId.prop('disabled', false);
        }
    });
    //   $("#create-lubricatornumber").validate({
    //     rules: {
    //         lubricator_number: {
    //             required: true
    //         },
    //     },
    //     messages: {
    //         lubricator_number: {
    //             required: "กรุณากรอกเบอร์น้ำมันเครื่อง"
    //         },
    //     },
    // });

    // $("#create-lubricatornumber").submit(function(){
    //     createlubricatornumber();
    // });

    // function createlubricatornumber(){
    //     event.preventDefault();
    //     var isValid = $("#create-lubricatornumber").valid();
    //     if(isValid){
    //         var myform = document.getElementById("create-lubricatornumber");
    //         var formData = new FormData(myform);
    //         $.ajax({
    //             url: base_url+"api/car/createBrand",
    //             data: formData,
    //             processData: false,
    //             contentType: false,
    //             type: 'POST',
    //             success: function (data) {
    //                 if(data.message == 200){
    //                     showMessage(data.message,"admin/car");
    //                 }else{
    //                     showMessage(data.message);
    //                 }
    //             }
    //         });
    //     }
    // }
</script>

</body>
</html>