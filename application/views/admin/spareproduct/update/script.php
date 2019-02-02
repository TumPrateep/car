<script>
    // function updatesdspare(){
    //     event.preventDefault();
    //     var isValid = $("#submit").valid();

    //     if(isValid){
    //         var data = $("#submit").serialize();
           
    //         $.post(base_url+"api/Spareproduct/update",data,
    //         function(data){
    //             if(data.message == 200){
    //                 showMessage(data.message,"admin/spareproduct");
    //             }else{
    //                 showMessage(data.message);
    //             }
    //         });
    //     }
    // }
      
    // ดึงข้อมูลมาเเสดงเพื่อแก้ไข #lubricatorChange เป็นชื่อที่ตั้งไว้เองไม่ได้เอามาจากหน้าไหน

    var productId =$("#productId").var();
    $.get(base_url+"api/Spareproduct/getUpdate",{
        "productId": productId
    },function(data){
        var spareproduct = data.data;  
        $("#spares_undercarriageId").val(spareproduct.spares_undercarriageId);
        $("#spares_brandId").val(spareproduct.spares_brandId);
        $("#brandId").val(spareproduct.brandId);
        $("#modelId").val(spareproduct.modelId);
        $("#detail").val(spareproduct.detail);
        $("#modelofcarId").val(spareproduct.modelofcarId);
        setBrandPicture(result.picture);
    });

    function setBrandPicture(picture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 200,
            type: 'image',
            imageState: {
                src: picturePath+"spareproduct/"+picture
            }
        });
    }

        setBrandPicture(result.picture);
        $("#submit").submit(function(){
            updatespare();
        })


        function updatespare(){
            event.preventDefault();
            var isValid = $("#submit").valid();
           
            
            if(isValid){
                var imageData = $('.image-editor').cropit('export');
                $('.hidden-image-data').val(imageData);
                var myform = document.getElementById("submit");
                var formData = new FormData(myform);

                $.ajax({
                url: base_url+"api/Spareproduct/update",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function(data){
                    if(data.message == 200){
                        showMessage(data.message,"admin/spareproduct");
                    }else{
                        showMessage(data.message);
                    }
                }
              });
            }
        };
    
</script>