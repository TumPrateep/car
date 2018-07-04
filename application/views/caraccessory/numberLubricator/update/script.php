<script>
var lubricator_numberId = $("#lubricator_numberId");
$("#submit").validate({
        rules: {
            lubricator_number: {
                required: true
            },
            lubricator_gear: {
                required: true
            }
        },
        messages: {
            lubricator_number: {
                required: "กรุณากรอกเบอร์น้ำมันเครื่อง"
            },
            lubricator_gear: {
                required: "กรุณาเลือกประเภทน้ำมันเครื่อง"
            }
        },
    });
    
    $("#submit").submit(function(){
        updatelubricatornumber();
    });

    function updatelubricatornumber(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiCaraccessories/Lubricatornumber/updateLubricatorNumber",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/numberLubricator");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>