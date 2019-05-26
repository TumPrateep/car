<script>
$("#submit").validate({
        rules: {
            rimName: {
                required: true
            },
        },
        messages: {
            rimName: {
                required: "กรุณากรอกขนาดยาง"
            }
        },
    });
    
    $("#submit").submit(function(){
        createRim();
    })


    function createRim(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Rim/createRim",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/tires");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
    

</script>


</body>
</html> 

