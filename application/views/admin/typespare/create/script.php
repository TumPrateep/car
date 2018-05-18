<script>
    $("#submit").validate({
        rules: {
            spares_undercarriageName: {
                required: true
            },
        },
        messages: {
            spares_undercarriageName: {
                required: "กรุณากรอกรายการอะไหล่"
            }
        },
    });
    
    $("#submit").submit(function(){
        createSpares();
    })


    function createSpares(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/spareundercarriage/createspareUndercarriage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"sparepartcar");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
