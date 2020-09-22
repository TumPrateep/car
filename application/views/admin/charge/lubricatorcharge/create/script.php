<script>
    var unit_id = $("#unit_id");
    var machine = $("#machineId");

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

    $("#submit").submit(function(){
        createlubricatorchange();
    })

    init();

    function init(){
        getunit();
        getAllMachine();
    }

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

    function getunit(){
        unit_id.html('<option value="">เลือกหน่วย</option>');
        $.get(base_url+"api/tirechangessize/getAllunit",{},
            function(data){
                var unitData = data.data;
                $.each( unitData, function( key, value ) {
                    unit_id.append('<option value="' + value.unit_id + '">' + value.unit + ' </option>');
                });
            } 
        );
    }

    function createlubricatorchange(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Lubricatorchange/createlubricatorchange",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/lubricatorcharge");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }
</script>