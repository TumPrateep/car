<script>
 $("#submit").validate({
        rules: {
            tire_modelName: {
                required: true
            },
        },
        messages: {
            tire_modelName: {
                required: "กรุณากรอกยี่ห้อยาง"
            }
        },
    });
    
    $("#submit").submit(function(){
        createTireModel();
    })

    
    function createTireModel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/Triemodel/createTireModel",data,
                function(data){
                    var tire_brandId = $("#tire_brandId").val();
                    if(data.message == 200){
                        showMessage(data.message,"admin/tires/tiresmodel/"+tire_brandId);
                    }else{
                        showMessage(data.message);
                    }
                });
                
            }
    }

</script>

</body>
</html>