<script>
     $("#create-lubricator").validate({
        rules: {
            lubricatorName: {
                required: true
            },
            lubricator_number:{
                required: true
            },
            api:{
                required: true
            },
            capacity:{
                required: true
            },
            lubricatortypeFormachineId:{
                required: true
            }
        },
        messages: {
            lubricatorName: {
                required: "กรุณากรอกน้ำมันเครื่อง"
            },
            lubricator_number:{
                required: "กรุณาเลือกเบอร์น้ำมันเครื่อง"
            },
            api:{
                required: "เลือกAPIน้ำมันเครื่อง"
            },
            capacity:{
                required: "เลือกความจุน้ำมันเครื่อง"
            },
            lubricatortypeFormachineId:{
                required: "เลือกประเภทเครื่องยนต์"
            }
        }
    });

    
    var lubricator_number = $("#lubricator_number");
    var lubricator_gear = $("#lubricator_gear");
    var machine = $("#machineId");
    var capacity = $("#capacity");
    var api = $("#api");

    init();

    function init(){
        getAllLubricatorNumber();
        getAllMachine();
    }

    function getAllLubricatorNumber(){
        lubricator_number.html('<option value="">เลือกเบอร์น้ำมันเครื่อง</option>');
        $.post(base_url+"api/Lubricatornumber/getAllLubricatorNumber",{
            lubricator_gear: lubricator_gear.val()
        },function(result){
                var data = result.data;
                if(data != null){
                    $.each( data, function( key, value ) {
                        lubricator_number.append('<option value="' + value.lubricator_numberId + '">' + value.lubricator_number + '</option>');
                    });
                }
            }
        );
    }

    lubricator_gear.change(function(){
        var lubricator_gear_id = $(this).val();
        var lubricator_brandId = $("#lubricator_brandId").val();
        getAllLubricatorNumber();
        triggerLubricatorDetail(lubricator_gear_id);
    });

    function triggerLubricatorDetail(lubricator_gear_id){
        if(lubricator_gear_id != 1){
            machine.val('');
            machine.prop('disabled', true);
            capacity.prop('disabled', true);
            capacity.val('');
            api.prop('disabled', true);
            api.val('');
        }else{
            machine.prop('disabled', false);
            capacity.prop('disabled', false);
            api.prop('disabled', false);
        }
    }

    function getAllMachine(){
        $.post(base_url+"api/Machine/getAllmachine",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                });
            }
        });
    }

    machine.change(function(){
        getAllLubricatorApi();
        getLubricatorCapacity();
    });

    function getAllLubricatorApi(){
        var machineId = machine.val();
        api.html('<option value="">เลือก API</option>');
        $.post(base_url+"api/Lubricatorapi/getAllapi",{
            machineId: machineId
        },function(data){
                var machineData = data.data;
                $.each( machineData, function( key, value ) {
                    api.append('<option value="' + value.apiId + '">' + value.api + '</option>');
                });
            }
        );
    }

    function getLubricatorCapacity(){
        var machineId = machine.val();
        capacity.html('<option value="">เลือกความจุ</option>');
        $.post(base_url+"api/Lubricatorcarpacity/getAllcapacity",{
            machineId: machineId
        },function(data){
                var machineData = data.data;
                $.each( machineData, function( key, value ) {
                    capacity.append('<option value="' + value.capacity_id + '">' + value.capacity + 'ลิตร</option>');
                });
            }
        );
    }

    $("#create-lubricator").submit(function(){
        createLubricator();
    })

    function createLubricator(){
        event.preventDefault();
        var isValid = $("#create-lubricator").valid();
        
        if(isValid){
            var data = $("#create-lubricator").serialize();
            $.post(base_url+"api/Lubricator/createlubricator/",data,
            function(data){
                var lubricator_brandId = $("#lubricator_brandId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricator/lubricators/"+lubricator_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }

    // $("#lubricatortypeFormachineId").change(function(){
    //     var machineType = $(this).val();
    //     var html = '<option value="">เลือกความจุ</option>';
    //     if(machineType == 1){
    //         html += '<option value="1">1 ลิตร</option>';
    //         html += '<option value="4">4 ลิตร</option>';
    //         html += '<option value="4+1">4+1 ลิตร</option>';
    //     }else{
    //         html += '<option value="1">1 ลิตร</option>';
    //         html += '<option value="6">6 ลิตร</option>';
    //         html += '<option value="6+1">6+1 ลิตร</option>';
    //     }

    //     $("#capacity").html(html);
    // })
</script>

</body>
</html>