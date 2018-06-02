<script>
$("#tires").validate({
            rules: {
                rimName: {
                    required: true
                },
            },
            messages: {
                rimName: {
                    required: "กรุณากรอกขอบยาง"
                }
            },
        });
  
function updaterim(){
        event.preventDefault();
        var isValid = $("#tires").valid();
        
        if(isValid){
            var data = $("#tires").serialize();
            $.post(base_url+"api/Rim/updaterim",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Tries");
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
</script>

</body>
</html>