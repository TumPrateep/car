<script>
$.validator.setDefaults({ ignore: ":hidden:not(select)" });
 $("#submit").validate({
        rules: {
            tire_change: {
                required: true
            },
            unit_id: {
                required: true
            },
            tire_rimId: {
                required: true
            },
            tire_sizeId: {
                required: true
            }
        },
        messages: {
            tire_change: {
                required: "กรุณากรอกราคาค่าบริการ"
            },
            unit_id: {
                required: "กรุณาเลือกหน่วย"
            },
            tire_rimId: {
                required: "กรุณาเลือกขอบยาง"
            },
            tire_sizeId: {
                required: "กรุณาเลือกขนาดยาง"
            }
        },
    });
    
    var oldrimId;
    // var tire_sizeId = $("#tire_sizeId").val();

    $.post(base_url+"api/Tirechangessize/getiresizeById",{
        "tire_size_chargeId": $('#tire_size_chargeId').val()
    },function(data){
        if(data.message!=200){
            showMessage(data.message,"admin/charge/tiresizecharge/"+rimId);  
        }else{
            result = data.data;
            oldrimId = result.rimId
            $("#tire_change").val(result.tire_size_price);
            init(result.rimId, result.tire_sizeId, result.unit_id);
        }
    });
    
    var tire_rim = $("#tire_rimId");
    var tire_size = $("#tire_sizeId");
    var unitN = $("#unit_id");

    

    function init(rimId, tire_sizeId, unit_id){
        getunit(unit_id);
        getRim(rimId, tire_sizeId);
    }

    function getunit(unit_id = null){
        unitN.html('<option>เลือกหน่วย</option>');
        $.get(base_url+"api/tirechangessize/getAllunit",{},
            function(data){
                var unitData = data.data;
                $.each( unitData, function( key, value ) {
                    unitN.append('<option value="' + value.unit_id + '">' + value.unit + ' </option>');
                });
                unitN.val(unit_id);
            } 
        );
    }

    function getRim(rimId = null,tire_sizeId = null){
        tire_rim.html('<option>เลือกขอบยาง</option>');
        $.get(base_url+"api/tirechangessize/getAllRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
                tire_rim.val(rimId);
                if(rimId){
                    tiresize(rimId,tire_sizeId);
                }
                // console.log(rimId,tire_sizeId);
            } 
        );
    }

    tire_rim.change(function(){
        tiresize();
    });

    function tiresize(rimId = null,tire_sizeId = null){
        var rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"service/Tire/getAllTireSize",{
            rimId: rimId
        },function(data){
            var brandData = data.data;
            // console.log(brandData);
                $.each( brandData, function( key, value ) {
                    console.log(brandData);
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                });

                if(tire_sizeId){
                    tire_size.val(tire_sizeId);
                }
            }
        );
    }



    
    $("#submit").submit(function(){
        updatetiresize();
    })

    function updatetiresize(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Tirechangessize/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/tiresizecharge/"+oldrimId);
                }else{
                    showMessage(data.message);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>