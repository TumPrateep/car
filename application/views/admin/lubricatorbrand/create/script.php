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
<<<<<<< HEAD
            lubricator_brandPicture: {
=======
            lubricator_brandName: {
>>>>>>> edd73ffc3728a663f6a934861c949a85bc4bad33
                required: "กรุณากรอกยี่ห้อน้ำมันเครื่อง"
            },
            brandPicture: {
                required: ""
            }
        },
    });

<<<<<<< HEAD
    // $("#lubricator_brandPicture").fileinput({
    //     language: "th",
    //     theme: 'fa',
    //     allowedFileExtensions: ['jpg' , 'png'],
    //     overwriteInitial: false,
    //     maxFileSize: 300,
    //     required: true,
    //     showCancel: false,
    //     showUpload: false,
=======
    $("#lubricator_brandPicture").fileinput({
        language: "th",
        theme: 'fa',
        allowedFileExtensions: ['jpg' , 'png'],
        overwriteInitial: false,
        maxFileSize: 300,
        required: true,
        showCancel: false,
        showUpload: false,
>>>>>>> edd73ffc3728a663f6a934861c949a85bc4bad33
                
        
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