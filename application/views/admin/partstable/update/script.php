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

    var parts_table_id = $("#parts_table_id").val();

    $.get(base_url+"api/partstable/getUpdate",{
        "parts_table_id" : parts_table_id
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/partstable");
        }

        if(data.message == 200){
            result = data.data;
            $("#parts_table_name").val(result.parts_table_name);
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
            $.post(base_url+"api/partstable/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/partstable");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
    
</script>