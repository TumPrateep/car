<script>

    $.post(base_url+"api/car/getModel",data,
    function(data){
        var modelId = $("#modelId").val();
        var brandId = $("#brandId").val();
        var yearStart = $("#yearStart").val();
        var yearEnd = $("#yearEnd").val();
       
        if(data.message!=200){
            showMessage(data.message,"car/model/"+modelId);
        }
    });
    
    $("#submit").validate({
        rules: {
            modelName: {
            required: true
            },
            yearStart: {
            required: true
            } 
        },
        messages: {
            modelName: {
            required: "กรุณากรอกชื่อรุ่นรถ"
            },
            yearStart: {
            required: "กรุณากรอกปีที่เริ่ม"
            }
        },
    });


    // function updateModel(){
    //         event.preventDefault();
    //         var isValid = $("#submit").valid();
            
    //         if(isValid){
    //             var data = $("#submit").serialize();
    //             $.post(base_url+"api/car/updateModel",data,
    //             function(data){
    //                 var brandId = $("#brandId").val();
    //                 showMessage(data.message,"car/model/"+brandId);
    //             });
                
    //         }
    //     }
    // });

</script>

</body>
</html>