<script>
      $("#update-filterbrand").validate({
        rules: {
            filter_brandName: {
                required: true
            },
        },
        messages: {
            filter_brandName: {
                required: "กรุณากรอกยี่ห้อไส้กรอง"
            },
        },
    });

    var filter_brandId = $("#filter_brandId").val();
    $.post(base_url+"api/Filterbrand/getFilterById",{
        "filter_brandId": filter_brandId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"filter_brandId");
        }else{
            result = data.data;
            $("#filter_brandName").val(result.filter_brandName);
            setfilterbrand(result.filter_picture);

        }
        
    });
    function setfilterbrand(filter_picture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 414,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"filter/"+filter_picture
            }
        });
    }

    $("#update-filterbrand").submit(function(){
        updatefilter_brand();
    });

    function updatefilter_brand(){
        event.preventDefault();
        var isValid = $("#update-filterbrand").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-filterbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Filterbrand/updateFilterbrands",
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
    
</script>

</body>
</html>