<script>
 $("#submit").validate({
        rules: {
            modelName: {
                required: true
            },
        },
        messages: {
            modelName: {
                required: "กรุณากรอกขนาดยาง"
            }
        },
    });
    
    $("#submit").submit(function(){
        updateTiresize();
    })

    function updateTiresize(){
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