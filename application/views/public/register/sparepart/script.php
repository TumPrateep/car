<script>
$(document).ready(function() {
    var register = $("#submit");
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    }, 'ภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
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
          password:{
            required: "พาสเวิด"
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
    
    function checkID(id) {
        if(id.length != 13) return false;
        for(i=0, sum=0; i < 12; i++)
            sum += parseFloat(id.charAt(i))*(13-i);
        if((11-sum%11)%10!=parseFloat(id.charAt(12)))
            return false;
        return true;
    }

      jQuery.validator.addMethod("pid", function(value, element) {
        return checkID(value);
      }, 'เลขบัตรประชาชนให้ถูกต้อง');
        
      var provinceDropdown = $("#provinceId");
      provinceDropdown.append('<option value="">เลือกจังหวัด</option>');

      var districtDropdown = $('#districtId');
      districtDropdown.append('<option value="">เลือกอำเภอ</option>');

      var subdistrictDropdown = $('#subdistrictId');
      subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

      function onLoad(){
        loadProvince();
        loadSparepartProvince();
      }
        onLoad();  
      function loadProvince(){
        $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
          function(data){
            var province = data.data;
            $.each(province, function( index, value ) {
              provinceDropdown.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
            });
          }
        );
      }

      provinceDropdown.change(function(){
        var provinceId = $(this).val();
        loadDistrict(provinceId);
      });

    function loadDistrict(provinceId){
      districtDropdown.html("");
      districtDropdown.append('<option value="">เลือกอำเภอ</option>');
      subdistrictDropdown.html("");
      subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

      $.post(base_url+"apiUser/LocationforRegister/getDistrict",{
        provinceId: provinceId
      },
        function(data){
          var district = data.data;
          $.each(district, function( index, value ) {
            districtDropdown.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
          });
        }
      );

    }

    districtDropdown.change(function(){
      var districtId = $(this).val();
      loadSubdistrict(districtId);
    });

    function loadSubdistrict(districtId){
      subdistrictDropdown.html("");
      subdistrictDropdown.append('<option value="">เลือกตำบล</option>');
      
      $.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
        districtId: districtId
      },
        function(data){
          var subDistrict = data.data;
          $.each(subDistrict, function( index, value ) {
            subdistrictDropdown.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
          });
        }
      );
    }
    var sparepartProvinceDropdown = $("#sparepart_provinceId");
    sparepartProvinceDropdown.append('<option value="">เลือกจังหวัด</option>');

    var sparepartDistrictDropdown = $('#sparepart_districtId');
    sparepartDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');

    var sparepartSubdistrictDropdown = $('#sparepart_subdistrictId');
    sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

    function loadSparepartProvince(){
      $.post(base_url+"apiUser/LocationforRegister/getProvince",{},
        function(data){
          var province = data.data;
          $.each(province, function( index, value ) {
            sparepartProvinceDropdown.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
          });
        }
      );
    }
    
    sparepartProvinceDropdown.change(function(){
      var provinceId = $(this).val();
      loadSparepartDistrict(provinceId);
    });

    function loadSparepartDistrict(provinceId){
      sparepartDistrictDropdown.html("");
      sparepartDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');
      sparepartSubdistrictDropdown.html("");
      sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

      $.post(base_url+"apiUser/LocationforRegister/getDistrict",{
        provinceId: provinceId
      },
        function(data){
          var district = data.data;
          $.each(district, function( index, value ) {
            sparepartDistrictDropdown.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
          });
        }
      );

    }
    
    sparepartDistrictDropdown.change(function(){
      var districtId = $(this).val();
      loadSparepartSubdistrict(districtId);
    });

    function loadSparepartSubdistrict(districtId){
      sparepartSubdistrictDropdown.html("");
      sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');
      
      $.post(base_url+"apiUser/LocationforRegister/getSubdistrict",{
        districtId: districtId
      },
        function(data){
          var subDistrict = data.data;
          $.each(subDistrict, function( index, value ) {
            sparepartSubdistrictDropdown.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
          });
        }
      );
    }

    register.submit(function (e) { 
      e.preventDefault();
      var isValid = register.valid();
      if(isValid){
        var data = register.serialize();
        $.post(base_url+"apiUser/Users/create", data,
          function (data, textStatus, jqXHR) {
            console.log(data);
          }
        );
      }
    });

  }); 
    
</script>

</body>
</html>