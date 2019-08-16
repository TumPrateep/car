<script>
    $("#submit").validate({
        rules: {
            gearname: {
                required: true
            },
        },
        messages: {
            gearname: {
                required: "กรุณากรอกชื่อประเภทเกียร์"
            }
        },
    });
    
    $("#submit").submit(function(){
        geartype();
    })


    function geartype(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/geartype/create",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/geartype");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
