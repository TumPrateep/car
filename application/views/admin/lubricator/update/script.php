<script>
      $("#update-lubricator").validate({
        rules: {
            lubricator_Name: {
                required: true
            },
        },
        messages: {
            lubricator_Name: {
                required: "กรุณากรอกน้ำมันเครื่อง"
            },
        },
    });


    // $("#update-lubricator").submit(function(){
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