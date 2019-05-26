<script>
     var lubricator_typeId = $("#lubricator_typeId").val();
    $.post(base_url+"api/Lubricatortype/getLubricatorType",{
        "lubricator_typeId": lubricator_typeId,
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/lubricatortype");
        }else{
            result = data.data;
            $("#lubricator_typeName").val(result.lubricator_typeName);
            $("#lubricator_typeSize").val(result.lubricator_typeSize);
            setLubricatorTypePicture(result.lubricator_typePicture);
        }
        
    });

    function setLubricatorTypePicture(lubricator_typePicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 210,
            height: 105,
            type: 'image',
            imageState: {
                src: picturePath+"lubricator_type/"+lubricator_typePicture
            }
        });
    }
    
    $("#submit").validate({
        rules: {
            lubricator_typeName: {
                required: true
            },
            lubricator_typeSize: {
                required: true
            }
        },
        messages: {
            lubricator_typeName: {
                required: "กรุณากรอกชื่อประเภทน้ำมันเครื่อง"
            },
            lubricator_typeSize: {
                required: "กรุณากรอกจำนวนระยะทาง"
            }
        },
    });
    
    $("#submit").submit(function(){
        updateLubricatorType();
    })

    function updateLubricatorType(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);

            $.ajax({
                url: base_url+"api/Lubricatortype/updateLubricatorType",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/lubricatortype");
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