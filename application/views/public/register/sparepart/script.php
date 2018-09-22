<script>

    

    $("#submit").validate({
        rules: {
        username: {
            required: true,
            username:true,
            minlength:4
            },
            email: {
                email: true
            },  
            phone: {
                required: true,
                minlength:9
            },    
            password: {
            required: true,
            minlength:6
            },
            confirmpassword: { 
            required: true,
            equalTo: "#password"
            },
            car_accessoriesName:{
              required: true
            },
            businessRegistration:{
              required: true
            },
            "sparepart-firstname":{
              required: true
            },
            "sparepart-lastname":{
              required: true
            },
            "sparepart-idcard":{
              required: true,
              pid: true
            },
            "sparepart-address":{
              required: true
            },
            "sparepart-provinceId":{
              required: true
            },
            "sparepart-districtId":{
              required: true
            },
            "sparepart-subdistrictId":{
              required: true
            },
            "sparepart-zipCode":{
              required: true,
              zipCode :true 
            },
            titleName:{
              required: true
            },
            firstname: {
              required: true
            },
            lastname: {
              required: true
            },
            address:{
              required: true
            },
            provinceId:{
              required: true
            },
            districtId: {
              required: true
            },
            subdistrictId: {
              required: true
            },
            phone1: {
              minlength: 9
            },
            phone2: {
              required: true,
              minlength: 9
            }
            




        },
        messages: {
            username: {
                required: "กรุณากรอกชื่อผู้ใช้งาน",
                minlength:"กรุณากรอกชื่อผู้ใช้อย่างน้อย 4 ตัวอักษร"
            },
            email: {
                email: "กรุณากรอกอีเมลให้ถูกต้อง"
            },
            phone: {
                required: "กรุณากรอกเบอร์โทรศัพท์",
                minlength:"กรุณากรอกเบอร์โทรศัพท์อย่างน้อย 9 ตัว"
            },
            password: {
                required: "กรุณากรอกรหัสผ่าน",
                minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร"
            },
            confirmpassword: {
                required: "กรุณากรอกรหัสผ่านอีกครั้ง",
                equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
            },
            car_accessoriesName:{
                required: "กรุณากรอกชื่ออู่"
            },
            businessRegistration:{
                required: "กรุณากรอกหมายเลขทะเบียนการค้า"
            },
            "sparepart-firstname":{
                required: "กรุณากรอกชื่อ"
            },
            "sparepart-lastname":{
                required: "กรุณากรอกนามสกุล"
            },
            "sparepart-idcard":{
                required: "กรุณากรอกเลขบัตรประชาชน"
            }, 
            "sparepart-address":{
                required: "กรุณากรอกที่อยู่"
            },
            "sparepart-provinceId":{
                required: "กรุณาเลือกจังหวัด"
            },
            "sparepart-districtId":{
                required: "กรุณาเลือกอำเภอ"
            },
            "sparepart-subdistrictId":{
                required: "กรุณาเลือกตำบล"
            },
            "sparepart-zipCode":{
                required: "กรุณากรอกรหัสไปรษณีย์"
            }
        }
    });

    
</script>

</body>
</html>