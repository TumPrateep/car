<script>
    $(document).ready(function(){

        $("#submit").submit(function(){
            createCarmodel();
        })

        $("#submit").validate({
            rules: {
                carModelName: {
                    required: true
                },
            },
            messages: {
                carModelName: {
                    required: "กรุณากรอกชื่อรุ่นรถ"
                }
            }
        });

        function createCarmodel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                
                
            }
        }
    });
</script>

</body>
</html>