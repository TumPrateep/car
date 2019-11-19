<script>
$(document).ready(function() {
    var register = $("#rigister");
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
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
          provinceId_user:{
            required: true
          },
          districtId_user: {
            required: true
          },
          subdistrictId_user: {
            required: true
          },
          phone1: {
            minlength: 9,
            required: true 
          },
          phone2: {
            minlength: 9
          },
          postCode_user:{
            required: true
          },
          sparepartname:{
              required: true
            },
          businessRegistration:{
            required: true
          },
          titleName_sparepart:{
            required: true
          },
          firstname_sparepart:{
            required: true
          },
          lastname_sparepart:{
            required: true
          },
          personalid:{
            required: true,
            pid: true
          },
          phone_sparepart: {
            minlength: 9,
            required: true 
          },
          hno_sparepart:{
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
          postCode_sparepart:{
            required: true
          },
          latitude:{
            required: true
          },
          longtitude:{
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
          titleName_user:{
            required: "คำนำหน้า"
          }
          ,
          firstname_user:{
            required: "ชื่อ"
          },
          lastname_user: {
            required: "นามสกุล"
          },
          hno_user:{
            required: "บ้านเลขที่"
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
          postCode_user:{
            required: "กรุณากรอกรหัสไปรษณี"
          },
          phone1: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
          },
          phone2: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว"
          },
          sparepartname:{
              required: "ชื่อร้านอะไหล่"
            },
          businessRegistration:{
            required: "หมายเลขทะเบียนการค้า"
          },
          titleName_sparepart:{
            required: "ชื่อ"
          },
          firstname_sparepart:{
            required: "ชื่อ"
          },
          lastname_sparepart:{
            required: "ชื่อ"
          },
          personalid:{
            required: "รหัสบัตรประชาชน",
            pid: "รหัสบัตรประชาชนให้ถูกต้อง"
          },
          hno_sparepart:{
            required: "บ้านเลขที่"
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
          phone_sparepart: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
          },
          postCode_sparepart:{
            required: "กรุณากรอกรหัสไปรษณี"
          },
          latitude:{
            required: "กรุุณากรอกละติจูด"
          },
          longtitude:{
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
        },
        onfocusout: function(element) {
            $(element).valid();
        },
        highlight : function(element, errorClass, validClass) {
            $(element.register).find('.actions').addClass('form-error');
            $(element).removeClass('valid');
            $(element).addClass('error');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element.register).find('.actions').removeClass('form-error');
            $(element).removeClass('error');
            $(element).addClass('valid');
        }
    });
}); 
    
</script>