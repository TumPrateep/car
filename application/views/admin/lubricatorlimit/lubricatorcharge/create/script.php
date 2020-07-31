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

    $("#submit").submit(function(){
        createlubricatorchange();
    })

    var machine = $("#machine_id");

    getMachine();

    function getMachine(){
        machine.html('<option value="">เลือกชนิดน้ำมันเครื่อง/เกียร์</option>');
        $.get(base_url+"api/machine/getAllmachine",{},
            function(data){
                var machineData = data.data;
                $.each( machineData, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });
            }
        );
    }

    function createlubricatorchange(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        var groupId = $("#groupId").val();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/lubricatorlimit/createlubricatorchange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorlimit/lubricatorcharge/"+groupId);
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>