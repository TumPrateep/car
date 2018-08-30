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

    function createModelcar(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            
        }
    }

</script>

</body>
</html>