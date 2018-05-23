<script> 

    var brandId = $("#brandId").val();

    $.post(base_url+"api/car/getBrandforupdate",{
        "brandId": brandId,
        
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"car/car");
        }

        if(data.message == 200){
            result = data.data;
            $("#brandName").val(result.brandName);
        }
        
    });
    var brandId = $("#file-3").val();

    $.post(base_url+"api/car/getBrandforupdate",{
        "brandPicture": brandPicture,
        
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"car/car");
        }

        if(data.message == 200){
            result = data.data;
            $("#brandName").val(result.brandName);
        }
        
    });
    $("#file-3").fileinput({
        theme: 'fa',
        showUpload: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        fileType: "any",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        initialPreview: [
            // <?=base_url("public/image/+brandPicture");?>
            
        ],
        initialPreviewConfig: [
            // {caption: "transport-1.jpg", size: 329892, width: "120px", url: "{$url}", key: 1}
            
        ]
    });

$("#update-brand").validate({
        rules: {
            brandName: {
            required: true
            },
        },
        messages: {
            brandName: {
            required: "กรุณากรอกยี่ห้อรถ"
            }
        },
    });


    $("#update-brand").submit(function(){
        updateBrand();
    })


    function updateBrand(){
        event.preventDefault();
        var isValid = $("#update-brand").valid();
        if(isValid){
            var myform = document.getElementById("update-brand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/car/updateBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"car");
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