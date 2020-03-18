
<script> 
      $("#create-advertisement").validate({
        rules: {
            advertisement_name: {
                required: true
            }
        },
        messages: {
            advertisement_name: {
                required: "กรุณากรอกชื่อโฆษณา"
            }
        },
    });

    $("#create-advertisement").submit(function(){
        createadvertisement();
    });

    function createadvertisement(){
        event.preventDefault();
        var isValid = $("#create-advertisement").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-advertisement");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/advertisement/createadvertisement",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/advertisement");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }
    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 600,
        height: 100,
        type: 'image/jpeg'
    });
</script>

</body>
</html>