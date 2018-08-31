<script> 

    var brandId = $("#brandId").val();

    $.post(base_url+"api/car/getBrandforupdate",{
        "brandId": brandId,
        
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/car");
        }

        if(data.message == 200){
            result = data.data;
            $("#brandName").val(result.brandName);
            setBrandPicture(result.brandPicture);
        }
        
    });

    function setBrandPicture(brandPicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"brand/"+brandPicture
            }
        });
    }

    $("#update-brand").validate({
        rules: {
            brandName: {
            required: true
            },
            brandPicture :{
            required: true   
            },
        },
        messages: {
            brandName: {
            required: "กรุณากรอกยี่ห้อรถ"
            },
            brandPicture :{
            required: ""   
            },
        },
    });


    $("#update-brand").submit(function(){
        updateBrand();
    })


    function updateBrand(){
        event.preventDefault();
        var isValid = $("#update-brand").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-brand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/car/updateBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/car");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
    
</script>

</body>
</html>