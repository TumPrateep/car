<script>
$(document).ready(function() {
    var register = $("registergarage");
    // jQuery.validator.addMethod("username", function(value, element) {
    //   return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    // }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
    register.validate({
        rules: {
          titleName_user:{
            required: true
          },
          firstname_user:{
            required: true
          },
          lastname_user: {
            required: true
          },
          hno_user:{
            required: true
          },
          village_user:{
            required: true
          },
          road_user:{
            required: true
          },  
          provinceId_user:{
            required: true
          },
          districtId_user: {
            required: true
          },
          subdistrictId_user: {
            required: true
          },
          postCode_user:{
            minlength: 5,
            required: true
          },
          phone1: {
            minlength: 9,
            required: true 
          },
          phone2: {
            minlength: 9
          },
          titleName_mechanic:{
              required: true
            },
          firstname_mechanic:{
            required: true
          },
          lastname_mechanic:{
            required: true
          },
          personalid_mechanic:{
            maxlength: 13,
            required: true,
            pid: true
          },
          phone_mechanic:{
            minlength: 9,
            required: true
          },
          exp:{
            required: true
          },
          skill:{
            required: true
          },
          garagename:{
            required: true
          },
          phone_garage:{
            required: true
          },
          businessRegistration:{
            required: true
          },
          timestart:{
            required: true
          },
          timeend:{
            required: true
          },
          hno_garage:{
            required: true
          },
          village_garage:{
            required: true
          },
          road_garage:{
            required: true
          },
          provinceId_garage:{
            required: true
          },
          districtId_garage:{
            required: true
          },
          subdistrictId_garage:{
            required: true
          },
          postCode_garage:{
            required: true
          },
          latitude:{
            required: true
          },
          longitude:{
            required: true
          },
          username:{
            minlength:6,
            required:true
            },
          phone_user: {
              required: true,
              minlength:9
          },
          email: {
              required: true
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
          titleName_user:{
            required: "คำนำหน้า"
          },
          firstname_user:{
            required: "ชื่อ"
          },
          lastname_user: {
            required: "นามสกุล"
          },
          hno_user:{
            required: "บ้านเลขที่"
          },
          village_user:{
            required: "หมู่ที่"
          },
          road_user:{
            required: "ถนน"
          },  
          provinceId_user:{
            required: "จังหวัด"
          },
          districtId_user: {
            required: "อำเภอ"
          },
          subdistrictId_user: {
            required: "ตำบล"
          },
          postCode_user: {
            required: "รหัสไปรษณีย์"
          },
          phone1: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
          },
          phone2: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว"
          },
          titleName_mechanic:{
              required: "คำนำหน้า"
            },
          firstname_mechanic:{
            required: "ชื่อ"
          },
          lastname_mechanic:{
            required: "นามสกุล"
          },
          personalid_mechanic:{
            maxlength: "รหัสบัตรประชาชนให้ครบ 13 ตัว",
            required: "รหัสบัตรประชาชน",
            pid: "รหัสบัตรประชาชนให้ถูกต้อง"
          },
          phone_mechanic:{
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
          },
          exp:{
            required: "ประสบการณ์"
          },
          skill:{
            required: "ความชำนาญ"
          },
          garagename:{
            required: "ชื่ออู่ซ่อมรภ"
          },
          phone_garage:{
            required: "เบอร์โทรศัพท์"
          },
          businessRegistration:{
            required: "หมายเลขทะเบียนการค้า"
          },
          timestart:{
            required: "เวลาที่เปิด"
          },
          timeend:{
            required: "เวลาที่ปิด"
          },
          hno_garage:{
            required: "บ้านเลขที่"
          },
          village_garage:{
            required: "หมู่ที่"
          },
          road_garage:{
            required: "ถนน"
          },
          provinceId_garage:{
            required: "จังหวัด"
          },
          districtId_garage:{
            required: "อำเภอ"
          },
          subdistrictId_garage:{
            required: "ตำบล"
          },
          postCode_garage:{
            required: "รหัสไปรษณีย์"
          },
          latitude:{
            required: "ละติจูด"
          },
          longitude:{
            required: "ลองติจูด"
          },
          username:{
            required: "ชื่อผู้ใช้งาน",
            minlength:"ชื่อผู้ใช้อย่างน้อย 6 ตัวอักษร"
          },
          phone: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
          },
          email: {
              required: "อีเมลล์"
          },
          password: {
            required: "รหัสผ่าน",
            minlength: "รหัสผ่านอย่างน้อย 6 ตัวอักษร"
          },
          confirmpassword: {
            required: "รหัสผ่านอีกครั้ง",
            equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
          }
        }
    });

</script>
</body>

</html>