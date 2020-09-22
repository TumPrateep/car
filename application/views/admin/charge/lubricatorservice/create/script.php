<script>
$(document).ready(function () {
    var machine = $("#machineId");

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

    getAllMachine();

    function getAllMachine(){
        machine.html('<option value="">เลือกประเภทเครื่องยนต์</option>');
        $.get(base_url+"api/Machine/getAllmachine",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });
            }
        });
    }

    $("#submit").submit(function(){
        createlubricatorservice();
    })

    function createlubricatorservice(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorservice/create",data,
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