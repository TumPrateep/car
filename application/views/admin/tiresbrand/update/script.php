<script>

    var tire_brandId = $("#tire_brandId").val();
    var picture = "";

    $.post(base_url+"api/Triebrand/getTireBrandforupdate",{
        "tire_brandId": tire_brandId,
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/tires/tiresbrand/");
        }

        if(data.message == 200){
            result = data.data;
            $("#tire_brandName").val(result.tire_brandName);
            picture = result.tire_brandPicture;
            

             $("#tire_brandPicture").fileinput({
                theme: 'fa',
                showUpload: false,
                showCancel: false,
                showCaption: false,
                browseClass: "btn btn-primary btn-lg",
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                overwriteInitial: false,
                initialPreviewAsData: true,
                allowedFileExtensions: ['jpg' , 'png'],
                
                initialPreview: [
                    base_url+"public/image/brand/"+tire_brandPicture
            
                ],
                initialPreviewConfig: [
                    {caption: base_url+"public/image/brand/"+tire_brandPicture , size: 576237, width: "120px", url: "/site/file-delete", key: 1} 
                ],
            });
        }
        
    });

    $("#update-tiresbrand").validate({
        rules: {
            tire_brandName: {
            required: true
            },
        },
        messages: {
            tire_brandName: {
            required: "กรุณากรอกยี่ห้อยางรถยนต์"
            }
        },
    });


   



    $("#submit").submit(function(){
        updateTireBrand();
    })
    function updateTireBrand(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Triebrand/updateTireBrand",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/tires/tiresbrand/");
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