<script> 
      $("#create-lubricatorbrand").validate({
        rules: {
            lubricator_brandName: {
                required: true
            },
            brandPicture: {
                required: true   
            } 
        },
        messages: {
            lubricator_brandPicture: {
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
            brandPicture: {
                required: ""
            }
        },
    });

    // $("#lubricator_brandPicture").fileinput({
    //     language: "th",
    //     theme: 'fa',
    //     allowedFileExtensions: ['jpg' , 'png'],
    //     overwriteInitial: false,
    //     maxFileSize: 300,
    //     required: true,
    //     showCancel: false,
    //     showUpload: false,
                
        
        // MaxFileHeight :300,
        // MaxFileWidth : 300

        
        
// });

    $("#create-lubricatorbrand").submit(function(){
        createlubricatorbrandsbrand();
    });

    function createlubricatorbrandsbrand(){
        event.preventDefault();
        var isValid = $("#create-lubricatorbrand").valid();
        if(isValid){
            var myform = document.getElementById("create-lubricatorbrand");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Lubricatorbrand/createLubricatorbrands",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/lubricatorbrand");
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