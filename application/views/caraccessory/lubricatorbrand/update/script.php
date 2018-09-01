<script>
var lubricator_brandId = $("#lubricator_brandId");
 $("#update-lubricatorbrand").validate({
        rules: {
            lubricator_brandName: {
                required: true
            },
        },
        messages: {
            lubricator_brandName: {
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
        },
    });
    var lubricator_brandId = $("#lubricator_brandId").val();
    $.post(base_url+"api/Lubricatorbrand/getLubricatorbrandsById",{
        "lubricator_brandId": lubricator_brandId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"caraccessory/BrandLubricator");
        }else{
            result = data.data;
            $("#lubricator_brandName").val(result.lubricator_brandName);
            setlubricatorbrand(result.lubricator_brandPicture);

        }
        
    });
    function setlubricatorbrand(lubricator_brandPicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 200,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"lubricator_brand/"+lubricator_brandPicture
            }
        });
    }

    $("#update-lubricatorbrand").submit(function(){
        updatelubricator_brand();
    });

    function updatelubricator_brand(){
        event.preventDefault();
        var isValid = $("#update-lubricatorbrand").valid();
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("update-lubricatorbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apiCaraccessories/Lubricatorbrand/updateLubricatorbrands",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/Lubricator");
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