<script>
    
    $(document).ready(function () {
        // var form = $("#submit");
        // var spare_pictire_id = $("#spare_pictire_id");

        // // var brand =$("#brandId");
        // // var model = $("#modelId");
        // // var modelofcar = $("#modelofcarId");
        // // var detail = $("#detail");
        // // var productId = $("#productId").val();

        form.validate({
            rules:{
                spares_undercarriageId: {
                    required: true,
                    THEN: true
                },
                spares_brandId: {
                    required: true,
                    THEN: true
                }
            },messages:{
                spares_undercarriageId: {
                    required: "กรุณาเลือกรายการอะไหล่",
                    THEN: "กรอกข้อมูลไม่ถูกต้อง"
                },
                spares_brandId: {
                    required: "กรุณาเลือกรายการยี่ห้ออะไหล่",
                    THEN: "กรอกข้อมูลไม่ถูกต้อง"
                }
             
            }
        });

        // // into();

        // // function into(){
            $.post(base_url+"api/sparespicture/getUpdate",{
                "spare_pictire_id" : spare_pictire_id
            },function(data){
                // if(data.message!=200){
                //     showMessage(data.message,"admin/sparespicture");
                // }
                // if(data.message == 200){
                //     result = data.data;
                //     $("#spares_undercarriageId").val(result.spares_undercarriageId);
                //     // getSparesUndercarriage(result.spares_undercarriageId);
                //     // getSparesbrand(result.spares_brandId);
                // }
                
            });
        // // }

        // function getSparesUndercarriage(spares_undercarriageId = null){
        //     $.get(base_url+"api/Spareundercarriage/getAllSpareundercarriage",{},
        //         function(data){
        //             var sparesUndercarriageData = data.data;
        //             $.each(sparesUndercarriageData, function( key, value ) {
        //                 spares_undercarriage.append('<option value="' + value.spares_undercarriageId + '">' + value.spares_undercarriageName + '</option>');
        //             });
        //             spares_undercarriage.val(spares_undercarriageId);
        //         }
        //     );
        // }

        // function getSparesbrand(spares_brandId = null){
        //     $.get(base_url+"api/Spareundercarriage/getAllSpareBrand",{},
        //         function(data){
        //             var sparesBrandData = data.data;
        //             $.each( sparesBrandData, function( key, value ) {
        //                 spares_brand.append('<option value="' + value.spares_brandId + '">' + value.spares_brandName + '</option>');
        //             });
        //             spares_brand.val(spares_brandId);
        //         }
        //     );
        // }

        // function initpicture(){
        //     $('.image-editor').cropit({
        //         allowDragNDrop: false,
        //         width: 200,
        //         height: 200,
        //         type: 'image/jpeg'
        //     });
        // }

        // form.submit(function(){
        //     updateBrand();
        // });

        // function updateBrand(){
        //     event.preventDefault();
        //     var isValid = form.valid();
        //     if(isValid){
        //         var imageData = $('.image-editor').cropit('export');
        //         $('.hidden-image-data').val(imageData);
        //         var myform = document.getElementById("submit");
        //         var formData = new FormData(myform);
        //         $.ajax({
        //             url: base_url+"api/sparespicture/update",
        //             data: formData,
        //             processData: false,
        //             contentType: false,
        //             type: 'POST',
        //             success: function (data) {
        //                 if(data.message == 200){
        //                     showMessage(data.message,"admin/sparespicture");
        //                 }else{
        //                     showMessage(data.message);
        //                 }
        //             }
        //         });
        //     }
        // }
    });

    

</script>

</body>
</html>