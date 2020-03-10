<script>
    
    $(document).ready(function () {
        var form = $("#submit");
        var filter_id = $("#filter_id").val();
        var filter_brandId = $("#filter_brandId").val();

        // var lubricator_number = $("#lubricator_number");
        // var lubricator_gear = $("#lubricator_gear");

        form.validate({
            rules:{
                filterName: {
                    required: true
                }
            },messages:{
                filterName: {
                    required: "กรุณากรอกรุ่นไส้กรอง"
                }
            }
        });

        $.post(base_url+"api/Filter/getFilter",{
            "filter_id" : filter_id
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/Filter/filters/"+filter_brandId);
            }
            if(data.message == 200){
                result = data.data;
                $("#filterName").val(result.filter_name);
            }
        });


        form.submit(function(){
            update();
        });

        function update(){
            event.preventDefault();
            var isValid = form.valid();
            if(isValid){
            var data = form.serialize();
            $.post(base_url+"api/Filter/updateFilter/",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Filter/filters/"+filter_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
        }
    });

    

</script>

</body>
</html>