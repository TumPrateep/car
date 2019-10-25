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

    var tire_rim = $("#tire_rimId");
    var tire_size = $("#tire_sizeId");
    var unit_id = $("#unit_id");

    init();

    function init(){
        getunit();
        getRim();
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

    function getRim(){
        tire_rim.html('<option value="">เลือกขอบยาง</option>');
        $.get(base_url+"api/tirechangessize/getAllRims",{},
            function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_rim.append('<option value="' + value.rimId + '">' + value.rimName + ' นิ้ว</option>');
                });
            } 
        );
    }

    tire_rim.change(function(){
        var rimId = tire_rim.val();
        tire_size.html('<option value="">เลือกขนาดยาง</option>');
        $.get(base_url+"service/Tire/getAllTireSize",{
            rimId: rimId
        },function(data){
                var brandData = data.data;
                $.each( brandData, function( key, value ) {
                    tire_size.append('<option value="' + value.tire_sizeId + '">' + value.tire_size + '</option>');
                });
            }
        );
    });
    
    $("#submit").submit(function(){
        createTiresize();
    })

    function createTiresize(){
        event.preventDefault();
        var isValid = $("#submit").valid();
        
        if(isValid){
            var data = $("#submit").serialize();
            $.post(base_url+"api/Tirechangessize/createtirechangeSize",data,
            function(data){
                var rimId = $("#rimId").val();
                if(data.message == 200){
                    showMessage(data.message,"admin/charge/tiresizecharge/"+rimId);
                }else{
                    showMessage(data.message,);
                }
            });
            
        }
    }
    
   
</script>

</body>
</html>