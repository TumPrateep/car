<script>
var lubricator_brandId = $("#lubricator_brandId");
 $("#create-lubricatorbrand").validate({
        rules: {
            lubricator_brandName: {
                required: true
            },
            brandPicture: {
                required: true   
            } 
        },
        messages: {
            lubricator_brandName: {
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
            brandPicture: {
                required: ""
            }
        },
    });

    $("#create-lubricatorbrand").submit(function(){
        createlubricatorbrandsbrand();
    });

    function createlubricatorbrandsbrand(){
        event.preventDefault();
        var isValid = $("#create-lubricatorbrand").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-lubricatorbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/Lubricatorbrand/createLubricatorbrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    var lubricator_brandId = $("#lubricator_brandId");
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/Lubricator");
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