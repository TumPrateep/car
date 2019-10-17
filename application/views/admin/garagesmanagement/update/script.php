<script> 
    //  $.validator.setDefaults({ ignore: ":hidden:not(select)" });
     $("#update-garagesmanagement").validate({
        rules: {
            titleName: {
                required: true
            },
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            garageName: {
                required: true
            },
            phone: {
                required: true
            },
            addressGarage: {
                required: true
            },
            phone1: {
                required: true
            }

            
        },
        messages: {
            titleName: {
                required: "กรุณาเลือกคำนำหน้า"
            },
            firstname: {
                required: "กรุณากรอกชื่อ"
            },
            lastname: {
                required: "กรุณากรอกนามสกุล"  
            },
            garageName: {
                required: "กรุณากรอกชื่ออู่ซ่อมรถ"
            },
            phone: {
                required: "เบอร์โทรศัพท์ร้าน"
            },
            addressGarage: {
                required: "กรุณากรอกนามสกุล"
            },
            phone1: {
                required: "กรุณากรอกเบอร์โทรศัพท์"
            }            
        },
    });


    $("#update-garagesmanagement").submit(function (e) { 
        e.preventDefault();
        $(this).valid();
    });
</script>

