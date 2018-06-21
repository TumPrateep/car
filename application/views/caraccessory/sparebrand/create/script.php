<script>
    $("#submit").validate({
        rules: {
            spares_brandName: {
                required: true
            },
        },
        messages: {
            spares_brandName: {
                required: "กรุณากรอกยี่ห้อรายการอะไหล่"
            }
        },
    });
    
    $("#submit").submit(function(){
        spares_brandName();
    })


    function spares_brandName(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiCaraccessories/SpareBrand/createSpareBrand",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/Spareundercarries");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
