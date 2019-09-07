<script>
    
    $(document).ready(function () {
        var form = $("#submit");
        // var spare_pictire_id = $("#spare_pictire_id").val();
        // var spares_undercarriage = $("#spares_undercarriageId");
        // var spares_brand = $("#spares_brandId");
        var lubricatorId = $("#lubricatorId").val();
        var lubricator_number = $("#lubricator_number");
        var lubricator_gear = $("#lubricator_gear");
        var machine = $("#machineId");
        var capacity_y = $("#capacity");
        var api_i = $("#api");

        // form.validate({
        //     rules:{
        //         spares_undercarriageId: {
        //             required: true
        //         },
        //         spares_brandId: {
        //             required: true
        //         }
        //     },messages:{
        //         spares_undercarriageId: {
        //             required: "เลือกรายการอะไหล่"
        //         },
        //         spares_brandId: {
        //             required: "เลือกรายการยี่ห้ออะไหล่"
        //         }
        //     }
        // });

        into();

        function into(){
            $.post(base_url+"api/Lubricator/getlubricator",{
                "lubricatorId" : lubricatorId
            },function(result){
                if(result.message!=200){
                    showMessage(result.message,"admin/lubricator");
                }
                if(result.message == 200){
                    var data = result.data;
                    $("#lubricatorName").val(data.lubricatorName);
                    getLubricatorNumber(data.lubricator_numberId);
                    getAllMachine(data.machine_id);
                    getAllLubricatorApi(data.api);
                    getLubricatorCapacity(data.capacity);

                } 
            });
        }

        function getLubricatorNumber(lubricator_numberId = null){
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

        lubricator_gear.change(function(){
            var lubricator_brandId = $("#lubricator_brandId").val();
            getLubricatorNumber();
        });

        function getAllMachine(machine_id = null){
            $.post(base_url+"api/Machine/getAllmachine",{},
            function(result){
                var data = result.data;
                if(data != null){
                    $.each( data, function( key, value ) {
                        machine.append('<option value="' + value.machineId + '">' + value.machine_type + '</option>');
                    });

                    machine.val(machine_id);
                }
            });
        }

        machine.change(function(){
            getAllLubricatorApi();
            getLubricatorCapacity();
        });

        function getAllLubricatorApi(api = null){
            var machineId = machine.val();
             api_i.html('<option value="">เลือกAPI</option>');
            $.post(base_url+"api/Lubricatorapi/getAllapi",{
                machineId: machineId
            },function(data){
                    var machineData = data.data;
                    $.each( machineData, function( key, value ) {
                        api_i.append('<option value="' + value.apiId + '">' + value.api + '</option>');
                    });

                    api_i.val(api);
                }
            );
        }

        function getLubricatorCapacity(capacity = null){
            var machineId = machine.val();
            capacity_y.html('<option value="">เลือกความจุ</option>');
            $.post(base_url+"api/Lubricatorcarpacity/getAllcapacity",{
                machineId: machineId
            },function(data){
                    var machineData = data.data;
                    $.each( machineData, function( key, value ) {
                        capacity_y.append('<option value="' + value.capacity_id + '">' + value.capacity + '</option>');
                    });

                    capacity_y.val(capacity);
                }
            );
        }

        form.submit(function(){
            update();
        });

        function update(){
            event.preventDefault();
            var isValid = form.valid();
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
    });

    

</script>

</body>
</html>