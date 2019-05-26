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
        sparesundercarriageName();
    })


    function sparesundercarriageName(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apicaraccessories/carspareundercarriage/createspareUndercarriage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/spareundercarries");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
