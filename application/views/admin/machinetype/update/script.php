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

    init();

    var brandId = $("#brandId").val();
    var modelId = $("#modelId").val();
    var modelofcarId = $("#modelofcarId").val();

    function init(){
        var machinetypeId = $("#machinetypeId").val();
        $.post(base_url+"api/Machinetype/getUpdate",{
            "machinetypeId": machinetypeId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/car/machinetype/"+brandId+"/"+modelId+"/"+modelofcarId);                
            }else{
                var result = data.data;
                $("#machinetype").val(result.machinetype);
                $("#gear").val(result.gear);
            }
            
        });
    }

    $("#submit").submit(function (e) { 
        e.preventDefault();
        update();
    });

    function update(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/Machinetype/update",data,
                function(data){
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