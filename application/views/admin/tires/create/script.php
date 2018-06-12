<script>
$("#submit").validate({
        rules: {
            rimName: {
                required: true
            },
            rimSeries: {
                required: true
            },
            wheels: {
                required: true
            }
        },
        messages: {
            rimName: {
                required: "กรุณากรอกหน้ายาง"
            },
            rimSeries: {
                required: "กรุณากรอกซีรี่ย์ยาง"
            },
            wheels: {
                required: "กรุณากรอกกะทะล้อ"
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

