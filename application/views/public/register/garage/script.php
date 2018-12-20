<script>
$(document).ready(function() {
    var register = $("#registergarage");
    var inputimg = $("garagePicture")

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
          personalid:{
            required: true,
            pid: true
          },
          exp:{
            required: true
          },
          skill:{
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
          postCode_user:{
            minlength: 5,
            required: true
          },
          phone1: {
            minlength: 9,
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
          phone: {
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
          checkpassword: { 
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
          personalid:{
            required: "รหัสบัตรประชาชน",
            pid: "รหัสบัตรประชาชนให้ถูกต้อง"
          },
          exp:{
            required: "ประสบการณ์"
          },
          skill:{
            required: "ความชำนาญ"
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
          postCode_user: {
            required: "รหัสไปรษณีย์"
          },
          phone1: {
            minlength: "เบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            required: "เบอร์โทรศัพท์"
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
          checkpassword: {
            required: "รหัสผ่านอีกครั้ง",
            equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
          }
        }
    });

    inputimg.fileinput({
      allowedFileExtensions: ['jpg' , 'png'],
      maxFileSize: 300,
      required: true,
      showUpload: false
    });

    navigator.geolocation.getCurrentPosition(function(location) {
      console.log(location.coords.latitude);
      console.log(location.coords.longitude);
      console.log(location.coords.accuracy);
    });
    
    jQuery.validator.addMethod("pid", function(value, element) {
        return checkID(value);
      }, 'เลขบัตรประชาชนให้ถูกต้อง');
    
    function checkID(id) {
        if(id.length != 13) return false;
        for(i=0, sum=0; i < 12; i++)
            sum += parseFloat(id.charAt(i))*(13-i);
        if((11-sum%11)%10!=parseFloat(id.charAt(12)))
            return false;
        return true;
    }

    var provinceDropdownUser = $("#provinceId_user");
    provinceDropdownUser.append('<option value="">เลือกจังหวัด</option>');

    var districtDropdownUser = $('#districtId_user');
    districtDropdownUser.append('<option value="">เลือกอำเภอ</option>');

    var subdistrictDropdownUser = $('#subdistrictId_user');
    subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');

    var provinceDropdownGarage = $("#provinceId_garage");
    provinceDropdownGarage.append('<option value="">เลือกจังหวัด</option>');

    var districtDropdownGarage = $('#districtId_garage');
    districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');

    var subdistrictDropdownGarage = $('#subdistrictId_garage');
    subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');

    function onLoad(){
      loadProvinceUser();
      loadProvinceGarage();
    }
    onLoad();

    function loadProvinceUser(){
      $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
        function(data){
          var province = data.data;
          $.each(province, function( index, value ) {
            provinceDropdownUser.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
          });
        }
      );
    }

    provinceDropdownUser.change(function(){
      var provinceId = $(this).val();
      loadDistrictUser(provinceId);
    });

    function loadDistrictUser(provinceId){
      districtDropdownUser.html("");
      districtDropdownUser.append('<option value="">เลือกอำเภอ</option>');
      subdistrictDropdownUser.html("");
      subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');

      $.post(base_url+"apiUser/LocationforRegister/getDistrict",{
        provinceId: provinceId
      },
        function(data){
          var district = data.data;
          $.each(district, function( index, value ) {
            districtDropdownUser.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
          });
        }
      );

    }

    districtDropdownUser.change(function(){
      var districtId = $(this).val();
      loadSubdistrictUser(districtId);
    });

    function loadSubdistrictUser(districtId){
      subdistrictDropdownUser.html("");
      subdistrictDropdownUser.append('<option value="">เลือกตำบล</option>');
        
      $.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
        districtId: districtId
      },
        function(data){
          var subDistrict = data.data;
          $.each(subDistrict, function( index, value ) {
            subdistrictDropdownUser.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
          });
        }
      );
    }

    function loadProvinceGarage(){
      $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
        function(data){
          var province = data.data;
          $.each(province, function( index, value ) {
            provinceDropdownGarage.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
          });
        }
      );
    }

    provinceDropdownGarage.change(function(){
      var provinceId = $(this).val();
      loadDistrictGarage(provinceId);
    });

    function loadDistrictGarage(provinceId){
      districtDropdownGarage.html("");
      districtDropdownGarage.append('<option value="">เลือกอำเภอ</option>');
      subdistrictDropdownGarage.html("");
      subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');

      $.post(base_url+"apiUser/LocationforRegister/getDistrict",{
        provinceId: provinceId
      },
        function(data){
          var district = data.data;
          $.each(district, function( index, value ) {
            districtDropdownGarage.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
          });
        }
      );

    }

    districtDropdownGarage.change(function(){
      var districtId = $(this).val();
      loadSubdistrictGarage(districtId);
    });

    function loadSubdistrictGarage(districtId){
      subdistrictDropdownGarage.html("");
      subdistrictDropdownGarage.append('<option value="">เลือกตำบล</option>');
        
      $.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
        districtId: districtId
      },
        function(data){
          var subDistrict = data.data;
          $.each(subDistrict, function( index, value ) {
            subdistrictDropdownGarage.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
          });
        }
      );
    }

    register.submit(function (e) { 
      e.preventDefault();
      var isValid = register.valid();
      if(isValid){
        var data = register.serialize();
        $.post(base_url+"apiUser/Users/creategarage", data,
          function (data, textStatus, jqXHR) {
            console.log(data);
            if(data.message == 200){
              window.location = base_url+"login";
            }else if(data.message == 3001){
             showMessage(data.message);
            }
          }
        );
      }      
    });

  });

</script>
</body>

</html>