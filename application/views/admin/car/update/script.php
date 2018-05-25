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
    
    // var brandId = $("#brandId").val();

    // $.post(base_url+"api/car/getBrandforupdate",{
    //     "brandPicture": brandPicture,
        
    // },function(data){
    //     if(data.message!=200){
    //         showMessage(data.message,"car/car");
    //     }

    //     if(data.message == 200){
    //         result = data.data;
    //         $("#brandName").val(result.brandName);
    //     }
        
    // });
    $("#brandPicture").fileinput({
        theme: 'fa',
        showUpload: false,
        showCancel: false,
        showCaption: false,
        browseClass: "btn btn-primary btn-lg",
        previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
        overwriteInitial: false,
        initialPreviewAsData: true,
        allowedFileExtensions: ['jpg'],
        
        initialPreview: [
          
    
        ],
        initialPreviewConfig: [
           
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