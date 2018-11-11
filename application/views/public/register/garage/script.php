<script>
$(document).ready(function() {
    var register = $("registergarage");
    // jQuery.validator.addMethod("username", function(value, element) {
    //   return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    // }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
    register.validate({
        rules: {
          titleName:{
            required: true
          },
          firstname1:{
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
            minlength: 9,
            required: true 
          },
          phone2: {
            minlength: 9
          },
          postCode:{
            required: true
          }
          ,
          car_accessoriesName:{
              required: true
            },
          businessRegistration:{
            required: true
          },
          firstname:{
            required: true
          },
          idcard:{
            required: true,
            pid: true
          },
          address1:{
            required: true
          },
          sparepart_provinceId:{
            required: true
          },
          sparepart_districtId:{
            required: true
          },
          sparepart_subdistrictId:{
            required: true
          },
          postCode1:{
            required: true
          },
          latitude:{
            required: true
          },
          longitude:{
            required: true
          },
          username:{
            minlength:4,
            required:true
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
        },
        messages: {
          titleName:{
            required: "คำนำหน้า"
          }
          ,
          firstname1:{
            required: "ชื่อ"
          },
          lastname: {
            required: "นามสกุล"
          },
          address:{
            required: "ที่อยู่"
          },
          provinceId:{
            required: "จังหวัด"
          },
          districtId: {
            required: "อำเภอ"
          },
          subdistrictId: {
            required: "ตำบล"
          },
          phone1: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
          },
          phone2: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว"
          },
          car_accessoriesName:{
              required: "ชื่อร้านอะไหล่"
            },
          businessRegistration:{
            required: "หมายเลขทะเบียนการค้า"
          },
          firstname:{
            required: "ชื่อ"
          },
          idcard:{
            required: "รหัสบัตรประชาชน",
            pid: "รหัสบัตรประชาชนให้ถูกต้อง"
          },
          address1:{
            required: "ที่อยู่"
          },
          sparepart_provinceId:{
            required: "จังวัด"
          },
          sparepart_districtId:{
            required: "อำเภอ"
          },
          sparepart_subdistrictId:{
            required: "ตำบล"
          },
          postCode1:{
            required: "กรุณากรอกรหัสไปรษณี"
          },
          latitude:{
            required: "กรุุณากรอกละติจูด"
          },
          longitude:{
            required: "ลองจิจูด"
          },
          username:{
            required: "ชื่อผู้ใช้งาน",
            minlength:"ชื่อผู้ใช้อย่างน้อย 4 ตัวอักษร"
          },
          phone: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
          },
          password: {
             required: "รหัสผ่าน",
            minlength: "รหัสผ่านอย่างน้อย 6 ตัวอักษร"
            },
          confirmpassword: {
            required: "รหัสผ่านอีกครั้ง",
            equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
            },
            postCode: {
              required: "รหัสไปรณี"
            }
        }
    });

</script>
</body>

</html>