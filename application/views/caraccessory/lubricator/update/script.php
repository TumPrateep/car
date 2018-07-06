<script>
      $("#submit").validate({
        rules: {
            lubricatorName: {
                required: true
            },
            lubricator_number:{
                required: true
            }
        },
        messages: {
            lubricatorName: {
                required: "กรุณากรอกน้ำมันเครื่อง"
            },
            lubricator_number:{
                required: "กรุณาเลือกเบอร์น้ำมันเครื่อง"
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
    }

    lubricator_gear.change(function(){
        var lubricator_brandId = $("#lubricator_brandId").val();
        init();
    });

    $("#submit").submit(function(){
        updateLubricator();
    })

    function updateLubricator(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"apiCaraccessories/Lubricator/update/",data,
            function(data){
                var lubricator_brandId = $("#lubricator_brandId").val();
                var lubricatorId = $("#lubricatorId").val();
                if(data.message == 200){
                    showMessage(data.message,"caraccessory/lubricator/lubricators/"+lubricator_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>