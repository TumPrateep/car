<script>
    $("#update-tiresbrand").validate({
            rules: {
                tirebrandName: {
                    required: true
                },
            },
            messages: {
                tirebrandName: {
                    required: "กรุณากรอกยี่ห้อยางรถยนต์"
                }
            }
        });
    
    $("#update-tiresbrand").submit(function(){
        createTirebrand();
    });
        
    function createTirebrand(){
        event.preventDefault();
        var isValid = $("#update-tiresbrand").valid();
        if(isValid){

        }
    }
  
    
</script>

</body>
</html>