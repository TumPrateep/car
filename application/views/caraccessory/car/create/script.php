<script>
    $("#submit").validate({
        rules: {
            brandName: {
                required: true
            },
            tempImage: {
                required: true
            }
        },
        messages: {
            brandName: {
                required: "กรุณากรอกยี่ห้อรถ"
            },
            tempImage: {
                required: "กรุณาใส่รูปยี่ห้อรถ",
                // extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            }
        },
    });

     $("#submit").submit(function(){
        brandName();
    })


    function brandName(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/CarAccessory/createBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/car");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
            
        }
    }

    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 200,
        height: 122,
        type: 'image/jpeg'
        // imageBackground: true,
        // imageState: {
        //     src: 'http://lorempixel.com/500/400/' // renders an image by default
        // }
    });
</script>



</body>
</html>