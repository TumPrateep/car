<script>
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
            }
        });
    
        $("#tire_brandPicture").fileinput({
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

    $("#update-tiresbrand").submit(function(){
        createTirebrand();
    });
        
    function createTirebrand(){
        event.preventDefault();
        var isValid = $("#update-tiresbrand").valid();
        if(isValid){

        }
    }

   


    var tire_brandId = $("#tire_brandId").val();

    $.post(base_url+"api/Triebrand/getTireBrandforupdate",{
        "tire_brandId": tire_brandId,
        
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/tires/tiresbrand/");
        }

        if(data.message == 200){
            result = data.data;
            $("#tire_brandName").val(result.tire_brandName);
        }
        
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