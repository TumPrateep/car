<script>
$(document).ready(function () {
    var machine = $("#machineId");
    var lubricator_serviceId = $("#lubricator_serviceId").val();

    $("#submit").validate({
        rules: {
            price: {
                required: true
            },
            machineId: {
                required: true
            },
        },
        messages: {
            price: {
                required: "ราคาค่าขนส่งน้ำมันเครื่อง"
            },
            machineId: {
                required: "เลือกประเภทน้ำมันเครื่อง/เกียร์"
            },
        },
    });

    getUpdate();

    function getUpdate(){
        $.post(base_url+"api/Lubricatorservice/getlubricatorservice",{
            "lubricator_serviceId": lubricator_serviceId
        },function(data){
            var lubricatorService = data.data;
            $("#price").val(lubricatorService.price);
            getAllMachine(lubricatorService.machine_id)
        });
    }

    function getAllMachine(machine_id){
        machine.html('<option value="">เลือกประเภทเครื่องยนต์</option>');
        $.get(base_url+"api/Machine/getAllmachine",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });

                if(machine_id){
                    machine.val(machine_id);
                }
            }
        });
    }

    $("#submit").submit(function(){
        updateLubricatorService();
    })

    function updateLubricatorService(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorservice/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/lubricatorservice/");
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }    
});
</script>