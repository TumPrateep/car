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
            }
        },
    });

    
    var lubricator_number = $("#lubricator_number");
    var lubricator_gear = $("#lubricator_gear");

    init();

    function init(){
        lubricator_number.html('<option value="">เลือกเบอร์น้ำมันเครื่อง</option>');
        $.post(base_url+"api/LubricatorNumber/getAllLubricatorNumber",{
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

        getAllLubricatortypeformachine();
    }

    var lubricatortypeFormachine = $("#lubricatortypeFormachineId");

    function getAllLubricatortypeformachine(){
        $.get(base_url+"api/Lubricatortypeformachine/getAllLubricatortypeformachine",{},
        function(result){
            var data = result.data;
            if(data != null){
                $.each( data, function( key, value ) {
                    lubricatortypeFormachine.append('<option value="' + value.lubricatortypeFormachineId + '">' + value.lubricatortypeFormachine + '</option>');
                });
            }
        });
    }

    lubricator_gear.change(function(){
        var lubricator_brandId = $("#lubricator_brandId").val();
        init();
    });

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