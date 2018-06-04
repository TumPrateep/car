<script>
 $("#createTireModel").validate({
        rules: {
            tire_modelName: {
                required: true
            },
        },
        messages: {
            tire_modelName: {
                required: "กรุณากรอกยี่ห้อยาง"
            }
        },
    });
    
    $("#submit").submit(function(){
        createTiresize();
    })

    function createTiresize(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Triesize/createtrieSize",data,
            function(data){
                var rimId = $("#rimId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/Tires/tiresize/"+rimId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>