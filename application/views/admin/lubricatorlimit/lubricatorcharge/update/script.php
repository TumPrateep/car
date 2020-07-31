<script>
    $("#submit").validate({
        rules: {
            lubricator_price: {
                required: true
            },
            machine_id:{
                required: true
            }
        },
        messages: {
            lubricator_price: {
                required: "กรอกราคาค่าบริการ"
            },
            machine_id:{
                required: "เลือกชนิดน้ำมันเครื่อง/เกียร์"
            }
        },
    });

    
    // var lubricator_changeId = $("#lubricator_changeId").val();
    var limitId = $("#limitId").val();
    var groupId = $("#groupId").val();
    var machine = $("#machine_id");
    
    $("#submit").submit(function(){
        updatelubricatorChange();  
    })

    function getMachine(machine_id){
        machine.html('<option value="">เลือกชนิดน้ำมันเครื่อง/เกียร์</option>');
        $.get(base_url+"api/machine/getAllmachine",{},
            function(data){
                var machineData = data.data;
                $.each( machineData, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });
                machine.val(machine_id);
            }
        );
    }

    function updatelubricatorChange(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/lubricatorlimit/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorlimit/lubricatorcharge/" + groupId);
                }else{
                    showMessage(data.message);
                }
            });
        }
    }

    $.get(base_url+"api/Lubricatorlimit/getLubricatorlimitChange",{
        "limitId": limitId
    },function(data){
        var lubricatorlimitchange = data.data;
        getMachine(lubricatorlimitchange.machine_id);
        $("#price").val(lubricatorlimitchange.price);
    });

    
</script>