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
            $.post(base_url+"api/Spareundercarriage/createspareUndercarriage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/sparepartcar");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
