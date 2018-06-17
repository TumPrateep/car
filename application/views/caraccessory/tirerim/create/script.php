<script>
$("#submit").validate({
        rules: {
            rimName: {
                required: true
            },
        },
        messages: {
            rimName: {
                required: "กรุณากรอกขอบยาง"
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
            $.post(base_url+"apiCaraccessories/TireRim/createRim",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/TireRim");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
    

</script>


</body>
</html> 

