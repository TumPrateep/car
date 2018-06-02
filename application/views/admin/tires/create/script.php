<script>
    $("#create-rim").submit(function(){
        createrim();
    });

    function createrim(){
        event.preventDefault();
        var isValid = $("#create-rim").valid();
        if(isValid){
            var myform = document.getElementById("create-rim");
            var formData = new FormData(myform);
            $.ajax({
                url: base_url+"api/Rim/createRim",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"admin/Tires");
                    }else{
                        showMessage(data.message);
                    }
                }
            });
        }
    }

    $("#submit").submit(function(){
            createrim();
        })

        $("#submit").validate({
            rules: {
                rimName: {
                required: true
                }
            },
            messages: {
                rimName: {
                required: "กรุณากรอกขนาดขอบยาง"
                }
            },
        });
   
</script>

</body>
</html>