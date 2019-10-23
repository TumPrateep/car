<script>
 $("#submit").validate({
        rules: {
            tire_size: {
                required: true
            }
            // tire_series: {
            //     required: true
            // },
            // rim: {
            //     required: true
            // }
        },
        messages: {
            tire_size: {
                required: "กรุณากรอกหน้ายาง"
            }
            // ,
            // tire_series: {
            //     required: "กรุณากรอกซีรี่ย์ยาง"
            // },
            // rim: {
            //     required: "กรุณากรอกขนาดกะทะล้อ"
            // }
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
        unit_id.html('<option>เลือกหน่วย</option>');
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
        tire_rim.html('<option>เลือกขอบยาง</option>');
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
        tire_size.html('<option>เลือกขนาดยาง</option>');
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