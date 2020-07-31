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
                required: "กรอกราคาค่าบริการ",
                min: "กรุณากรอกราคาเต็มจำนวน"
            },
            machine_id:{
                required: "เลือกชนิดน้ำมันเครื่อง/เกียร์"
            }
        },
    });
    
    var lubricator_change_garageId = $("#lubricator_change_garageId").val();
    var machine = $("#machine_id");
    
    $("#submit").submit(function(){
        updatelubricatorChangegarage();
        
    })

    // แก้ไข
    function updatelubricatorChangegarage(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
           
            $.post(base_url+"apigarage/Lubricatorchange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/charge/lubricator");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }

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
      
    // ดึงข้อมูลมาเเสดงเพื่อแก้ไข #lubricatorChange เป็นชื่อที่ตั้งไว้เองไม่ได้เอามาจากหน้าไหน
    $.get(base_url+"apigarage/Lubricatorchange/getUpdate",{
        "lubricator_change_garageId": lubricator_change_garageId
    },function(data){
        var lubricatorChange = data.data;  
        $("#lubricator_price").val(lubricatorChange.lubricator_price);
        getMachine(lubricatorChange.machine_id);
    });

    
    
</script>