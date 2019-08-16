<script>

        
    $("#spares").validate({
            rules: {
                spares_brandName: {
                    required: true
                },
                spares_brandPicture :{
                    required: true   
                },
            },
            messages: {
                spares_brandName: {
                    required: "กรุณากรอกยี่ห้ออะไหล่"
                },
                spares_brandPicture :{
                    required: ""   
                },
            },
        });
  


    var spares_brandId = $("#spares_brandId").val();

    $.post(base_url+"api/Sparepartcar/getBrand",{
        "spares_brandId": spares_brandId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/sparepartcar/sparepart/");
        }

        if(data.message == 200){
            result = data.data;
            $("#spares_brandName").val(result.spares_brandName);
            setBrandPicture(result.spares_brandPicture);
        }
        
    });

    function setBrandPicture(spares_brandPicture){
        $('.image-editor').cropit({
            allowDragNDrop: false,
            width: 414,
            height: 122,
            type: 'image',
            imageState: {
                src: picturePath+"sparesbrand/"+spares_brandPicture
            }
        });
    }

    
    $("#spares").submit(function(){
        updateBrand();
    })


    function updateBrand(){
        event.preventDefault();
        var isValid = $("#spares").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var data = $("#spares").serialize();
            $.post(base_url+"api/Sparepartcar/updateSpareBrand",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/sparepartcar/sparepart/");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }



    

</script>

</body>
</html>
