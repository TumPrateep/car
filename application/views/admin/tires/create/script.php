<script>
    $("#submit").validate({
        rules: {
            rimName: {
                required: true
            },
        },
        messages: {
            rimName: {
                required: "กรุณากรอกขนาดขอบยาง"
            }
        },
    });
    
    $("#submit").submit(function(){
        createrim();
    })


    function createrim(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Rim/createRim",data,
            function(data){
                var rimId = $("#rimId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/Tires");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>


</body>
</html>