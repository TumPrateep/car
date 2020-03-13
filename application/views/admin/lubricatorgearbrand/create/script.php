<script> 
      $("#create-lubricatorbrand").validate({
        rules: {
            lubricator_gear_brandName: {
                required: true
            },
            brandPicture: {
                required: true   
            } 
        },
        messages: {
            lubricator_gear_brandName: {
                required: "กรุณากรอกยี่ห้อน้ำมันเกียร์"
            },
            brandPicture: {
                required: ""
            }
        },
    });

    $("#create-lubricatorbrand").submit(function(){
        createLubricatorbrands();
    });

    function createLubricatorbrands(){
        event.preventDefault();
        var isValid = $("#create-lubricatorbrand").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-lubricatorbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/lubricatorgearbrand/createlubricatorgearbrands",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/lubricatorgear");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 414,
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