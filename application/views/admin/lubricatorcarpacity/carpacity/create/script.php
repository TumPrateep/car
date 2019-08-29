<script>
    $("#submit").validate({
        rules: {
            lubricatorcarpacity: {
                required: true
            },
        },
        messages: {
            lubricatorcarpacity: {
                required: "กรุณากรอกความจุ"
            }
        },
    });
    
    $("#submit").submit(function(){
        carpacity();
    })


    function carpacity(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorcarpacity/createcarpacity",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorcarpacity/");//carpacity/"+data.machineId 
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
