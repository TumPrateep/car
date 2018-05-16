<script>
    $("#spares").validate({
        rules: {
            sparesbrandName: {
                required: true
            },
        },
        messages: {
            sparesbrandName: {
                required: "กรุณากรอกยี่ห้ออะไหล่"
            }
        },
    });
    
    $("#spares").submit(function(){
        createSpares();
    })

    function createSpares(){
        event.preventDefault();
        var isValid = $("#spares").valid();
        
        if(isValid){
            var data = $("#spares").serialize();
            $.post(base_url+"api/sparepartcar/createSpareBrand",data,
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
