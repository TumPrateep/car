<script>
      $("#update-lubricatorbrand").validate({
        rules: {
            lubricatorbrandName: {
                required: true
            },
        },
        messages: {
            lubricatorbrandName: {
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
        },
    });

    // $("#update-lubricatorbrand").submit(function(){
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