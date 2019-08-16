<script>
    $("#createsparesBrand").validate({
        rules: {
            spares_brandName: {
                required: true
            },
            spares_brandPicture: {
                required: true
            } 
        },
        messages: {
            spares_brandName: {
                required: "กรุณากรอกยี่ห้ออะไหล่"
            },
            spares_brandPicture: {
                required: ""
            }
        },
    });

    $("#spares_brandPicture").fileinput({
        language: "th",
        theme: 'fa',
        allowedFileExtensions: ['jpg' , 'png'],
        overwriteInitial: false,
        maxFileSize: 300,
        required: true,
        showCancel: false,
        showUpload: false
    });

    
    $("#createsparesBrand").submit(function(){
        createSpares();
    })


    function createSpares(){
        event.preventDefault();
        var isValid = $("#createsparesBrand").valid();
        
        if(isValid){
            var imageData = $('.image-editor').cropit('export');
            $('.hidden-image-data').val(imageData);
            var data = $("#createsparesBrand").serialize();
            $.post(base_url+"api/Sparepartcar/createSpareBrand",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/sparepartcar/sparepart/");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
    $('.image-editor').cropit({
        allowDragNDrop: false,
        width: 414,
        height: 122,
        type: 'image/jpeg'
        // imageBackground: true,
        // imageState: {
        //     src: 'http://lorempixel.com/500/400/' // renders an image by default
        // }
    });

</script>

</body>
</html>
