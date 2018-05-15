<script>
    $(document).ready(function(){

        $("#submit").submit(function(){
            createModel();
        })

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