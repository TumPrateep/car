<script>
    $("#update-lubricator").validate({
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

    var lubricator_brandId = $("#lubricator_brandId").val();
    var lubricatorId = $("#lubricatorId").val();
    var lubricator_number = $("#lubricator_number");
    var lubricator_gear = $("#lubricator_gear");

     init();

    function init(){
        //getLubricator();
        getAllLubricatorNumber();
        getAllMachine();
    }

    function getLubricatorNumber(lubricator_numberId = ""){
        lubricator_number.html('<option value="">เลือกเบอร์น้ำมันเครื่อง</option>');
        $.post(base_url+"api/Lubricatornumber/getAllLubricatorNumber",{
            lubricator_gear: lubricator_gear.val()
        },function(result){
                var data = result.data;
                if(data != null){
                    $.each( data, function( key, value ) {
                        lubricator_number.append('<option value="' + value.lubricator_numberId + '">' + value.lubricator_number + '</option>');
                    });

                    lubricator_number.val(lubricator_numberId);
                }

            }
        );
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
        var lubricator_brandId = $("#lubricator_brandId").val();
        getAllLubricatorNumber();
    });

    var machine = $("#machineId");
    var capacity = $("#capacity");
    var api = $("#api");

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
        api.html('<option value="">เลือกAPI</option>');
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



    var lubricatortypeFormachine = $("#lubricatortypeFormachineId");

    function getAllLubricatortypeformachine(lubricatortypeFormachineId){
        $.post(base_url+"api/Lubricatortypeformachine/getAllLubricatortypeformachine",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    lubricatortypeFormachine.append('<option value="' + value.lubricatortypeFormachineId + '">' + value.lubricatortypeFormachine + '</option>');
                });

                lubricatortypeFormachine.val(lubricatortypeFormachineId);
            }
        });
    }

    // function getLubricator(){
    //     $.post(base_url+"api/Lubricator/getlubricator",{
    //         "lubricatorId": lubricatorId,
    //     },function(result){
    //         var data = result.data;
    //         $("#lubricatorName").val(data.lubricatorName);
    //         lubricator_gear.val(data.lubricator_gear);
    //         getLubricatorNumber(data.lubricator_numberId);
    //         getAllLubricatortypeformachine(data.lubricatortypeFormachineId)
    //     });
    // }

     lubricator_gear.change(function(){
        lubricator_number.val("");
        getLubricatorNumber();
    });

    $.post(base_url+"api/Lubricator/getlubricator",{
        "lubricatorId": $("#lubricatorId").val()
        // "capacity" : $("$capacity").val()
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/car/model/"+brandId);
        }

        if(data.message == 200){
            result = data.data;
            $("#api").val(result.api);
            $("#capacity").val(result.capacity);
            
            
        }
        
    });
    $("#update-lubricator").submit(function(){
        updateLubricator();
    })

    function updateLubricator(){
        event.preventDefault();
        var isValid = $("#update-lubricator").valid();
        
        if(isValid){
            var data = $("#update-lubricator").serialize();
            $.post(base_url+"api/Lubricator/updatelubricator/",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Lubricator/lubricators/"+lubricator_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>