<script>
    $(document).ready(function(){

        $("#submit").submit(function(){
            createModel();
        })

        $("#submit").validate({
            rules: {
                modelName: {
                required: true
                },
                yearStart: {
                required: true
                } 
            },
            messages: {
                modelName: {
                required: "กรุณากรอกชื่อรุ่นรถ"
                },
                yearStart: {
                required: "กรุณากรอกปีที่เริ่ม"
                }
            },
        });

        function createModel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/car/createModel",data,
                function(data){
                    var brandId = $("#brandId").val();
                    showMessage(data.message,"car/model/"+brandId);
                });
                
            }
        }
    });
</script>

</body>
</html>