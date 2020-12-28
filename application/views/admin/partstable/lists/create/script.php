<script>
    $("#submit").validate({
        rules: {
            kilometre: {
                required: true
            }
        },
        messages: {
            kilometre: {
                required: "ระยะในการเช็ค(กม.)"
            }
        },
    });

    $("#submit").submit(function(){
        create();
    })

    var parts_table_id = $('#parts_table_id').val();

    function create(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/partstablelist/create",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/partstable/lists/"+parts_table_id);
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>