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

    function update(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/machinetype/update",data,
                function(data){
                    var brandId = $("#brandId").val();
                    var modelId = $("#modelId").val();
                    var modelofcarId = $("#modelofcarId").val();
                    if(data.message == 200){
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