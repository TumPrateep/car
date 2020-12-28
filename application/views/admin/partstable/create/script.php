<script>
    $("#submit").validate({
        rules: {
            parts_table_name: {
                required: true
            }
        },
        messages: {
            parts_table_name: {
                required: "กรอกชื่อตารางเช็คระยะ"
            }
        },
    });

    $("#submit").submit(function(){
        create();
    })


    function create(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/partstable/create",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/partstable");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>