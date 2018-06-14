<script>
 $("#submit").validate({
        rules: {
            tire_size: {
                required: true
            },
            tireSeries: {
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
            tireSeries: {
                required: "กรุณากรอกซีรี่ย์ยาง"
            },
            rim: {
                required: "กรุณากรอกขนาดกะทะล้อ"
            }
        },
    });
    
    var rimId = $("#rimId").val();
    var tire_sizeId = $("#tire_sizeId").val();

    $.post(base_url+"api/Triesize/getiresizeById",{
        "rimId": rimId,
        "tire_sizeId" : tire_sizeId
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/Tires/tiresize/"+rimId+"/"+tire_sizeId);
        }else{
            result = data.data;
            $("#tire_size").val(result.tire_size);
        }
        
    });
    
    $("#submit").submit(function(){
        updatetiresize();
    })

    function updatetiresize(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Triesize/updatetriesize",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Tires/tiresize/"+rimId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>