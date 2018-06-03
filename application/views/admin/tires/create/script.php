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
                    showMessage(data.message,"admin/Tires");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
    

</script>


</body>
</html> 

<!-- <script>
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
            $.post(base_url+"api/SparePartCar/createSpareBrand",data,
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
</html> -->