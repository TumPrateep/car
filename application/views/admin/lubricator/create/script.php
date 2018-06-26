<script>
      $("#create-lubricator").validate({
        rules: {
            lubricatorName: {
                required: true
            },
        },
        messages: {
            lubricatorName: {
                required: "กรุณากรอกน้ำมันเครื่อง"
            },
        },
    });


     $("#submit").submit(function(){
        createLubricator();
    })

    function createLubricator(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricator/createlubricator/",data,
            function(data){
                var lubricatorId = $("#lubricatorId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricator",+lubricatorId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>