<script>
     $("#create-filter").validate({
        rules: {
            filterName: {
                required: true
            }
        },
        messages: {
            filterName: {
                required: "กรุณากรอกรุ่นไส้กรอง"
            }
        }
    });

    $("#create-filter").submit(function(){
        createfilter();
    })

    function createfilter(){
        event.preventDefault();
        var isValid = $("#create-filter").valid();
        
        if(isValid){
            var data = $("#create-filter").serialize();
            $.post(base_url+"api/Filter/createfilter/",data,
            function(data){
                var filter_brandId = $("#filter_brandId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/Filter/filters/"+filter_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>