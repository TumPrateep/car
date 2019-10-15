<script> 
    $(document).ready(function () {
    //  $.validator.setDefaults({ ignore: ":hidden:not(select)" });
     $("#update-partsshop").validate({
        rules: {
            car_accessoriesName: {
                required: true
            },
            car_accessories_phone: {
                required: true
            },
            shop_address: {
                required: true
            },
            profile_firstname: {
                required: true
            },
            profile_titleName: {
                required: true
            },
            profile_lastname: {
                required: true
            },
            phone1: {
                required: true
            },

            
        },
        messages: {
            car_accessoriesName: {
                required: "กรุณากรอกชื่อร้าน"
            },
            car_accessories_phone: {
                required: "กรุณากรอกเบอร์โทรศัพท์ร้าน"
            },
            shop_address: {
              required: "กรุณากรอกที่อยู่ร้าน"  
            },
            profile_titleName: {
                required: "กรุณาเลือกคำนำหน้า"
            },
            profile_firstname: {
                required: "กรุณากรอกชื่อ"
            },
            profile_lastname: {
                required: "กรุณากรอกนามสกุล"
            },
            phone1: {
                required: "กรุณากรอกเบอร์โทรศัพท์"
            },
            
        },
    });

    into();

    function into(){
        $.post(base_url+"api/Managepartsshop/getUpdate",{
            "car_accessoriesId" : car_accessoriesId
        },function(data){
            if(data.message!=200){
                showMessage(data.message,"admin/managepartsshop");
            }
            if(data.message == 200){
                result = data.data;
                $("#car_accessoriesName").val(result.car_accessoriesName);
                $("#car_accessories_phone").val(result.phone);
                $("#profile_firstname").val(result.name);
            }
            
        });
    }

    $("#update-partsshop").submit(function (e) { 
        e.preventDefault();
        $(this).valid();
    });

});
</script>

</body>
</html>