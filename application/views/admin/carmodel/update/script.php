<script>
$("#submit").validate({
    rules: {
        modelofcarName: {
            required: true
        },
    },
    messages: {
        modelofcarName: {
            required: "กรุณากรอกชื่อรุ่นรถ"
        }
    }
});
$("#submit").submit(function(){
        updateCarmodel();
    })


    function updateCarmodel(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Modelofcar/update",data,
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