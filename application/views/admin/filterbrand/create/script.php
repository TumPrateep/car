<script> 
      $("#create-filterd").validate({
        rules: {
            filter_brandName: {
                required: true
            },
            filter_brandPicture: {
                required: true   
            } 
        },
        messages: {
            filter_brandName: {
                required: "กรุณากรอกยี่ห้อไส้กรอง"
            },
            filter_brandPicture: {
                required: ""
            }
        },
    });

    $("#create-filterd").submit(function(){
        createFilter();
    });

    function createFilter(){
        event.preventDefault();
        var isValid = $("#create-filterd").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("create-filterd");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Filterbrand/createfilter",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/Filter");
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
    });
</script>

</body>
</html>