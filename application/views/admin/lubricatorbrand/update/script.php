<script>
      $("#update-lubricatorbrand").validate({
        rules: {
            lubricator_brandName: {
                required: true
            },
        },
        messages: {
            lubricator_brandName: {
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
        },
    });
    var lubricator_brandId = $("#lubricator_brandId").val();
    $.post(base_url+"api/Lubricatorbrand/getLubricatorbrandsById",{
        "lubricator_brandId": lubricator_brandId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"lubricator_brandId");
        }else{
            result = data.data;
            $("#lubricator_brandName").val(result.lubricator_brandName);
           

        }
        
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