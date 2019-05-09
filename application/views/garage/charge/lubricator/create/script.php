<script>
    $("#submit").validate({
        rules: {
            lubricator_price: {
                required: true
            }
        },
        messages: {
            lubricator_price: {
                required: "กรอกราคาค่าบริการ",
                min: "กรุณากรอกราคาเต็มจำนวน"
            }
        },
    });

    $("#submit").submit(function(){
        createlubricatorchangegarage();
    })

    function createlubricatorchangegarage(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiGarage/Lubricatorchange/createLubricatorchangegarage",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/charge/lubricator");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }

       

</script>