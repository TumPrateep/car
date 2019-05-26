<script>
    $("#submit").validate({
        rules: {
            lubricator_price: {
                required: true
            }
        },
        messages: {
            lubricator_price: {
                required: "กรอกราคาค่าบริการ",
                min: "กรุณากรอกราคาเต็มจำนวน"
            }
        },
    });
    
    var lubricator_change_garageId = $("#lubricator_change_garageId").val();
    
    $("#submit").submit(function(){
        updatelubricatorChangegarage();
        
    })

    // แก้ไข
    function updatelubricatorChangegarage(){
        event.preventDefault();
        var isValid = $("#submit").valid();

        if(isValid){
            var data = $("#submit").serialize();
           
            $.post(base_url+"apigarage/Lubricatorchange/update",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"garage/charge/lubricator");
                }else{
                    showMessage(data.message);
                }
            });
        }
    }
      
    // ดึงข้อมูลมาเเสดงเพื่อแก้ไข #lubricatorChange เป็นชื่อที่ตั้งไว้เองไม่ได้เอามาจากหน้าไหน
    $.get(base_url+"apigarage/Lubricatorchange/getUpdate",{
        "lubricator_change_garageId": lubricator_change_garageId
    },function(data){
        var lubricatorChange = data.data;  
        $("#lubricator_price").val(lubricatorChange.lubricator_price);
    });

    
    
</script>