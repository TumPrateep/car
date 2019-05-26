<script>
 $("#submit").validate({
        rules: {
            lubricator_typeName: {
                required: true
            },
            lubricator_typeSize: {
                required: true
            },
            tempImage: {
                required: true
            }
        },
        messages: {
            lubricator_typeName: {
                required: "กรุณากรอกชื่อประเภทน้ำมันเครื่อง"
            },
            lubricator_typeSize: {
                required: "กรุณากรอกจำนวนระยะทาง"
            },
            tempImage: {
                required: ""
            }
        },
    });

    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 210,
        height: 105,
        type: 'image'
    });
    
    $("#submit").submit(function(){
        createLubricatorType();
    })

    function createLubricatorType(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            
            $.ajax({
                url: base_url+"api/Lubricatortype/createtrieSize",
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