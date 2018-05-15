<script>
    $(document).ready(function(){

        $("#submit").submit(function(){
            createModel();
        })

        // $("#register").click(function(){
        // register();
        // })
        function createModel(){
            event.preventDefault();
            var isValid = $("#submit").valid();
            
            if(isValid){
                var data = $("#submit").serialize();
                $.post(base_url+"api/car/createModel",data,
                function(data){
                    if(data.message == 200){
                    //window.location.assign(base_url);
                    }
                })
                .fail(function() {
                    $("#error-message").show();
                })
        }

        }

});
</script>

</body>
</html>