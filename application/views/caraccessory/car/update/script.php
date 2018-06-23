
<script> 

    // var brandId = $("#brandId").val();

    // $.post(base_url+"apiCaraccessories/Caraccessories/",{
    //     "brandId": brandId,
        
    // },function(data){
    //     if(data.message!=200){
    //         showMessage(data.message,"admin/car/car");
    //     }

    //     if(data.message == 200){
    //         result = data.data;
    //         $("#brandName").val(result.brandName);
    //     }
        
    // });

        var brandId = $("#brandId").val();
    
        $.post(base_url+"api/car/getBrand",{
            "brandId": $("#brandId").val()
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"caraccessory/car/"+brandId);
            }
    
            if(data.message == 200){
                result = data.data;
                $("#brandName").val(result.brandName); 
            }
            
        });
        
    // });

    // $("#brandPicture").fileinput({
    //     language: "th",
    //     theme: 'fa',
    //     allowedFileExtensions: ['jpg' , 'png'],
    //     overwriteInitial: false,
    //     maxFileSize: 300,
    //     required: true,
    //     showCancel: false,
    //     showUpload: false
    // });


$("#submit").validate({
        rules: {
            brandName: {
                required: true
            },
            brandPicture: {
                required: true
            }
        },
        messages: {
            brandName: {
                required: "กรุณากรอกยี่ห้อรถ"
            },
            brandPicture: {
                required: "กรุณาใส่รูปยี่ห้อรถ"
                // extension: "กรุณาใส่รูปภาพที่นามสกุล .jpg"
            }
        },
    });

    $("#submit").validate({
            rules: {
                brandName: {
                    required: true
                },
            },
            messages: {
                brandName: {
                    required: "กรุณากรอกชื่อยี่ห้อรถ"
                },
            }
        });
    
    
        $("#submit").submit(function(){
            updateBrand();
        })
    

    $("#submit").submit(function(){
        updatecar();
    })


    function updatecar(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var myform = document.getElementById("submit");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"apicaraccessories/caraccessories/updatecar",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {

            // function updateBrand(){
            // event.preventDefault();
            // var isValid = $("#submit").valid();
            
            // if(isValid){
            //     var data = $("#submit").serialize();
                
            //     $.post(base_url+"apiCaraccessories/CarAccessory/updateBrand",data,
            //     function(data){
                    
                    if(data.message == 200){
                        showMessage(data.message,"caraccessory/Car");
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
        }
    
</script>

</body>
</html>