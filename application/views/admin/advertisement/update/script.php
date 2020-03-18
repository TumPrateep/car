<script>
      $("#update-advertisement").validate({
        rules: {
            advertisement_name: {
                required: true
            },
        },
        messages: {
            advertisement_name: {
                required: "กรุณากรอกโฆษณา"
            },
        },
    });

    var advertisement_id = $("#advertisement_id").val();

    $.post(base_url+"api/advertisement/getadvertisementsById",{
        "advertisement_id": advertisement_id
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"advertisement_id");
        }else{
            result = data.data;
            $("#advertisement_name").val(result.advertisement_name);
            setadvertisement(result.advertisement_picture);

        }
        
    });
    function setadvertisement(advertisement_picture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 600,
            height: 100,
            type: 'image',
            imageState: {
                src: picturePath+"advertisement/"+advertisement_picture
            }
        });
    }

    $("#update-advertisement").submit(function(){
        updateadvertisement();
    });

    function updateadvertisement(){
        event.preventDefault();
        var isValid = $("#update-advertisement").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-advertisement");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/advertisement/updateadvertisements",
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
    
</script>

</body>
</html>