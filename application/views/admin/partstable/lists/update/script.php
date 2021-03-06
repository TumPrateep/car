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

    var parts_table_id = $("#parts_table_id").val();
    var parts_table_list_id = $("#parts_table_list_id").val();

    $.get(base_url+"api/partstablelist/getUpdate",{
        "parts_table_list_id" : parts_table_list_id
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/partstable/lists/"+parts_table_id);
        }

        if(data.message == 200){
            result = data.data;
            $("#kilometre").val(result.kilometre);
        }
        
    });
    
    $("#submit").submit(function(){
        update();
    })


    function update(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/partstablelist/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/partstable/lists/"+parts_table_id);
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
    
</script>