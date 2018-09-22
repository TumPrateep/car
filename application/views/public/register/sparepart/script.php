<script>
$(document).ready(function() {
    var register = $("#submit");
    // jQuery.validator.addMethod("username", function(value, element) {
    //   return this.optional( element  ) || /^[A-Za-z\d]+$/.test( value );
    // }, 'กรุณากรอกภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
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
            require: true 
          },
          phone2: {
            minlength: 9
          },
          postCode:{
            required: true
          },
          car_accessoriesName:{
              required: true
            },
          businessRegistration:{
            required: true
          },
          sparepart_firstname:{
            required: true
          },
          sparepart_lastname:{
            required: true
          },
          sparepart_idcard:{
            required: true,
            pid: true
          },
          sparepart_address:{
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
          sparepart_zipCode:{
            required: true,
            zipCode :true 
          },
        },
        messages: {
          titleName:{
            required: "กรุณากรอกคำนำหน้า"
          },
          firstname1:{
            required: "กรุณากรอกชื่อ"
          },
          lastname: {
            required: "กรุณากรอกนามสกุล"
          },
          address:{
            required: "กรุณากรอกที่อยู่"
          },
          provinceId:{
            required: "กรุณากรอกจังหวัด"
          },
          districtId: {
            required: "กรุณากรอกอำเภอ"
          },
          subdistrictId: {
            required: "กรุณากรอกตำบล"
          },
          phone1: {
            minlength: "กรุณากรอกเบอร์โทรศัพท์อย่างน้อย 9 ตัว",
            require: "กรุณากรอกเบอร์โทรศัพท์"
          },
          phone2: {
            minlength: "กรุณากรอกเบอร์โทรศัพท์อย่างน้อย 9 ตัว"
          },
          car_accessoriesName:{
              required: "กรุณากรอกชื่อร้านอะไหล่"
            },
          businessRegistration:{
            required: "หมายเลขทะเบียนการค้า"
          },
          sparepart_firstname:{
            required: "กรุณากรอกชื่อ"
          },
          sparepart_idcard:{
            required: "กรุณากรอกรหัสบัตรประชาชน,
            pid: true
          },
          sparepart_address:{
            required: "กรุณากรอกที่อยู่"
          },
          sparepart_provinceId:{
            required: "กรุณากรอกจังวัด"
          },
          sparepart_districtId:{
            required: "กรุณากรอกอำเภอ"
          },
          sparepart_subdistrictId:{
            required: "กรุณากรอกตำบล"
          },
          sparepart_zipCode:{
            required: "กรุณากรอกรหัสไปรษณี,
            zipCode :true 
          },
        }
    });

    register.submit(function (e) { 
      e.preventDefault();
      var isValid = register.valid();
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
      }, 'กรุณากรอกเลขบัตรประชาชนให้ถูกต้อง');
        
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
        $.post(base_url+"LocationforRegister/getProvince",{},
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

      $.post(base_url+"LocationforRegister/getDistrict",{
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
      
      $.post(base_url+"LocationforRegister/getSubdistrict",{
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

    function loadProvince(){
        $.post(base_url+"LocationforRegister/getProvince",{},
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

      $.post(base_url+"LocationforRegister/getDistrict",{
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
    
      $.post(base_url+"LocationforRegister/getSubdistrict",{
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




    var sparepartProvinceDropdown = $("#sparepart-provinceId");
    sparepartProvinceDropdown.append('<option value="">เลือกจังหวัด</option>');

    var sparepartDistrictDropdown = $('#sparepart-districtId');
    sparepartDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');

    var sparepartSubdistrictDropdown = $('#sparepart-subdistrictId');
    sparepartSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

    function loadSparepartProvince(){
      $.post(base_url+"LocationforRegister/getProvince",{},
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

      $.post(base_url+"LocationforRegister/getDistrict",{
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
      
      $.post(base_url+"LocationforRegister/getSubdistrict",{
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

  }); 
    
</script>

</body>
</html>