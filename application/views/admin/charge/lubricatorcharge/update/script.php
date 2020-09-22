<script>
    var unit_id = $("#unit_id");
    var machine = $("#machineId");
    var lubricator_changeId = $("#lubricator_changeId").val();

    $("#submit").validate({
        rules: {
            tire_price: {
                required: true
            },
            unit_id: {
                required: true
            }
        },
        messages: {
            tire_price: {
                required: "กรอกราคาค่าบริการ"
            },
            unit_id: {
                required: "เลือกหน่วย"
            }
        },
    });

    function getUpdate(){
        $.get(base_url+"api/Lubricatorchange/getUpdate",{
            "lubricator_changeId": lubricator_changeId
        },function(data){
            var lubricatorChange = data.data;
            $("#lubricator_price").val(lubricatorChange.lubricator_price);
            getunit(lubricatorChange.unit_id);
            getAllMachine(lubricatorChange.machine_id);
        });
    }

    getUpdate();

    function getAllMachine(u_machine_id){
        machine.html('<option value="">เลือกประเภทเครื่องยนต์</option>');
        $.get(base_url+"api/Machine/getAllmachine",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });

                if(u_machine_id){
                    machine.val(u_machine_id);
                }
            }
        });
    }

    function getunit(u_unit_id){
        unit_id.html('<option value="">เลือกหน่วย</option>');
        $.get(base_url+"api/tirechangessize/getAllunit",{},
            function(data){
                var unitData = data.data;
                $.each( unitData, function( key, value ) {
                    unit_id.append('<option value="' + value.unit_id + '">' + value.unit + ' </option>');
                });

                if(u_unit_id){
                    unit_id.val(u_unit_id);
                }
            } 
        );
    }
    
    $("#submit").submit(function(){
        updatelubricatorChange();
    })

    function updatelubricatorChange(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorchange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/lubricatorcharge");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }

    
</script>