<script>
 $("#submit").validate({
        rules: {
            tire_size: {
                required: true
            },
            tire_series: {
                required: true
            },
            rim: {
                required: true
            }
        },
        messages: {
            tire_size: {
                required: "กรุณากรอกขนาดยาง"
            },
            tire_series: {
                required: "กรุณากรอกซีรี่ย์ยาง"
            },
            rim: {
                required: "กรุณากรอกขนาดกะทะล้อ"
            }
        },
    });
    
    $("#submit").submit(function(){
        createTireSize();
    })

    function createTireSize(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/Tiresize/createtrieSize",data,
            function(data){
                var rimId = $("#rimId").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/tiresize/index/"+rimId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>