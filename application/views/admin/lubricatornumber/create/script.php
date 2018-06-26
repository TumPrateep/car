<script>
      $("#create-lubricatornumber").validate({
        rules: {
            lubricator_number: {
                required: true
            },
        },
        messages: {
            lubricator_number: {
                required: "กรุณากรอกเบอร์น้ำมันเครื่อง"
            },
        },
    });

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