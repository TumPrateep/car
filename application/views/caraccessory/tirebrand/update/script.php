<script>
        $("#submit").validate({
            rules: {
                brandName: {
                required: true
                },
            },
            messages: {
                brandName: {
                required: "กรุณากรอกชื่อยี่ห้อยาง"
                },
            }  
        });
        $("#tire_brandPicture").fileinput({
                language: "th",
                theme: 'fa',
                allowedFileExtensions: ['jpg' , 'png'],
                overwriteInitial: false,
                maxFileSize: 300,
                required: true,
                showCancel: false,
                showUpload: false
            });
        var tire_brandId = $("#tire_brandId").val();
        var picture = "";

    $.post(base_url+"api/Triebrand/getTireBrandforupdate",{
        "tire_brandId": tire_brandId,
        "tire_modelId" : tire_modelId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"caraccessory/TireModel/index/"+tire_brandId);
        }else{
            result = data.data;
            $("#tire_modelName").val(result.tire_modelName);
        }
        
    });
    
    // $("#submit").submit(function(){
    //     updateTireBrand();
    // })

    // function updateTireBrand(){
    //     event.preventDefault();
    //     var isValid = $("#submit").valid();
        
    //     if(isValid){
    //         var data = $("#submit").serialize();
    //         $.post(base_url+"apiCaraccessories/TireBrand/updateTireBrand_post",data,
    //         function(data){
    //             if(data.message == 200){
    //                 showMessage(data.message,"caraccessory/TireBrand/index/"+tire_brandId);
    //             }else{
    //                 showMessage(data.message,);
    //             }
    //         });
            
    //     }
    // }
    
   
</script>

</body>
</html>