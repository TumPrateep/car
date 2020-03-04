<script>
    
    $(document).ready(function () {
        var form = $("#submit");
        var lubricatorId = $("#lubricatorId").val();
        var lubricator_number = $("#lubricator_number");
        var lubricator_gear = $("#lubricator_gear");
        // var lubricator_brandId = $("#lubricator_brandId");

        form.validate({
            rules:{
                spares_undercarriageId: {
                    required: true
                },
                spares_brandId: {
                    required: true
                }
            },messages:{
                spares_undercarriageId: {
                    required: "เลือกรายการอะไหล่"
                },
                spares_brandId: {
                    required: "เลือกรายการยี่ห้ออะไหล่"
                }
            }
        });

        init();

        function init(){
            $.post(base_url+"api/Lubricatorgear/getlubricatorgears",{
                "lubricatorId": lubricatorId,
            },function(data){
                if(data.message!=200){
                    showMessage(data.message,"admin/Lubricatorgear/lubricatorgears/"+lubricator_brandId);
                }

                if(data.message == 200){
                    result = data.data;
                    $("#lubricatorName").val(result.lubricatorName);
                    if(result.typeId == 1){
                        $("#lubricator_gear").val(result.gear_type);
                    }else{
                        $("#lubricator_gear").val(result.gear_type);
                    }
                    getAllLubricatorNumber(result.gear_type);
                }
            });
        }

        function getAllLubricatorNumber(gear_type = null){
            lubricator_number.html('<option value="">เลือกเบอร์น้ำมันเกียร์</option>');
            $.post(base_url+"api/Lubricatorgear/getAllLubricatorgearsnumber",{
                lubricator_gear: lubricator_gear.val()
            },function(result){
                    var data = result.data;
                    if(data != null){
                        $.each( data, function( key, value ) {
                            lubricator_number.append('<option value="' + value.numberId + '">' + value.number + '</option>');
                        });
                        lubricator_number.val(gear_type);
                    }
                }
            );
        }

        lubricator_gear.change(function(){
            var lubricator_brandId = $("#lubricator_brandId").val();
            getAllLubricatorNumber();
        });

        form.submit(function(){
            update();
        });

        function update(){
            event.preventDefault();
            var isValid = form.valid();
            if(isValid){
            var data = form.serialize();
            $.post(base_url+"api/Lubricatorgear/updatelubricatogears/",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/Lubricatorgear/lubricatorgears/"+$("#lubricator_brandId").val());
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