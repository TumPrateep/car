<script>
      $("#update-lubricatorsnumber").validate({
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

    // $("#update-lubricatorsnumber").submit(function(){
    //     updateBrand();
    // });

    // function updateBrand(){
    //     event.preventDefault();
    //     var isValid = $("#update-brand").valid();
    //     if(isValid){
    //         var myform = document.getElementById("update-brand");
    //         var formData = new FormData(myform);
    //         $.ajax({
    //             url: base_url+"api/car/updateBrand",
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