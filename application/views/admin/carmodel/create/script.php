<script>
$("#submit").validate({
    rules: {
        modelofcarName: {
            required: true
        },
        machineSize: {
            required: true
        },
        machineCode: {
            required: true
        }
    },
    messages: {
        modelofcarName: {
            required: "กรุณากรอกชื่อรุ่นรถ"
        },
        machineSize: {
            required: "กรุณากรอกขนาดเครื่องยนต์(CC)"
        },
        machineCode: {
            required: "กรุณากรอกรหัสเครื่องยนต์"
        }
    }
});
$("#submit").submit(function(){
        createModelcar();
    })
    function createModelcar(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Modelofcar/create",data,
            function(data){
                var brandId = $("#brandId").val();
                var modelId = $("#modelId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/car/carmodel/"+brandId+'/'+modelId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }

</script>

</body>
</html>