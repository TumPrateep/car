<script>
    $("#createsparesBrand").validate({
        rules: {
            spares_brandName: {
                required: true
            },
        },
        messages: {
            spares_brandName: {
                required: "กรุณากรอกยี่ห้ออะไหล่"
            }
        },
    });
    
    $("#createsparesBrand").submit(function(){
        createSpares();
    })


    function createSpares(){
        event.preventDefault();
        var isValid = $("#createsparesBrand").valid();
        
        if(isValid){
            var data = $("#createsparesBrand").serialize();
            $.post(base_url+"api/sparepartcar/createSpareBrand",data,
            function(data){
                var spares_undercarriageId = $("#spares_undercarriageId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/sparepartcar/sparepart/"+spares_undercarriageId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    

</script>

</body>
</html>
