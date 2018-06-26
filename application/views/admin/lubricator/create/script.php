<script>
      $("#create-lubricator").validate({
        rules: {
            lubricator_name: {
                required: true
            },
        },
        messages: {
            lubricator_name: {
                required: "กรุณากรอกน้ำมันเครื่อง"
            },
        },
    });


    // $("#create-lubricator").submit(function(){
    //     createBrand();
    // });

    // function createBrand(){
    //     event.preventDefault();
    //     var isValid = $("#create-brand").valid();
    //     if(isValid){
    //         var myform = document.getElementById("create-brand");
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