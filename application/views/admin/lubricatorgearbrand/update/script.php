<script>
      $("#update-lubricatorbrand").validate({
        rules: {
            lubricator_gear_brandName: {
                required: true
            },
        },
        messages: {
            lubricator_gear_brandName: {
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
        },
    });

    var lubricator_brandId = $("#lubricator_brandId").val();
    $.post(base_url+"api/Lubricatorgearbrand/getLubricatorgearbrandsById",{
        "lubricator_brandId": lubricator_brandId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"lubricator_brandId");
        }else{
            result = data.data;
            $("#lubricator_gear_brandName").val(result.gear_brandName);
            setlubricatorbrand(result.gear_picture);

        }
        
    });
    function setlubricatorbrand(gear_picture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 414,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"lubricator_brand_gear/"+gear_picture
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
                url: base_url+"api/Lubricatorgearbrand/updateLubricatorgearbrands",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/Lubricatorgear");
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