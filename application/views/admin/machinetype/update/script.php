<script>
    $("#submit").validate({
        rules: {
            machinetype: {
                required: true
            },
            gear: {
                required: true
            } 
        },
        messages: {
            machinetype: {
                required: "กรุณาเลือกชนิดเครื่องยนต์"
            },
            gear: {
                required: "กรุณาเลือกเกียร์"
            }
        },
    });

    $("#submit").submit(function(){
            createModelcar();
    })

    var brandId = $("#brandId").val();
    var modelId = $("#modelId").val();
    var modelofcarId = $("#modelofcarId").val();

    function createModelcar(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
                $.post(base_url+"api/Machinetype/create",data,
                function(data){
                    if(data.message == 200){
                        var brandId = $("#brandId").val();
                        showMessage(data.message,"admin/car/machinetype/"+brandId+"/"+modelId+"/"+modelofcarId);
                    }else{
                        showMessage(data.message);
                    }
                });
        }
    }

</script>

</body>
</html>