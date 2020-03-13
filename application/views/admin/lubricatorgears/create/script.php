<script>
     $("#create-lubricator").validate({
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
        }
    });

    
    var lubricator_number = $("#lubricator_number");
    var lubricator_gear = $("#lubricator_gear");

    init();

    function init(){
        getAllLubricatorNumber();
    }

    function getAllLubricatorNumber(){
        lubricator_number.html('<option value="">เลือกเบอร์น้ำมันเกียร์</option>');
        $.post(base_url+"api/lubricatorgear/getAllLubricatorgearsnumber",{
            lubricator_gear: lubricator_gear.val()
        },function(result){
                var data = result.data;
                if(data != null){
                    $.each( data, function( key, value ) {
                        lubricator_number.append('<option value="' + value.numberId + '">' + value.number + '</option>');
                    });
                }
            }
        );
    }

    lubricator_gear.change(function(){

        getAllLubricatorNumber();
    });

    $("#create-lubricator").submit(function(){
        createLubricator();
    })

    function createLubricator(){
        event.preventDefault();
        var isValid = $("#create-lubricator").valid();
        
        if(isValid){
            var data = $("#create-lubricator").serialize();
            $.post(base_url+"api/lubricatorgear/createlubricatogears/",data,
            function(data){
                var lubricator_brandId = $("#lubricator_brandId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/lubricatorgear/lubricatorgears/"+lubricator_brandId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
</script>

</body>
</html>