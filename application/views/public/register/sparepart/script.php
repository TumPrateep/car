<script src="<?=base_url("public/themes/register/");?>vendor/jquery-steps/jquery.steps.min.js"></script>
<script src="<?=base_url("public/themes/register/");?>vendor/minimalist-picker/dobpicker.js"></script>
<!-- <script src="<?php echo base_url() ?>public/js/jquery.datetimepicker.full.min.js"></script> -->
<!-- <script src="<?=base_url("/public/js/jquery.cropit.js") ?>"></script> -->
<script src="<?=base_url("public/themes/register/");?>js/main.js"></script>
<script src="<?=base_url("public/themes/register/");?>js/setcheckbox.js"></script>

<script>

  function getLocation() {
    navigator.geolocation.getCurrentPosition(function(location) {
      // console.log(location.coords.latitude);
      // console.log(location.coords.longitude);
      console.log(location.coords.accuracy);
      document.getElementById("latitude").value = (location.coords.latitude);
      document.getElementById("longtitude").value = (location.coords.longitude);
    });
  };

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

    register.steps({
        headerTag: "h3",
        bodyTag: "fieldset",
        transitionEffect: "fade",
        labels: {
            previous : 'ก่อนหน้า',
            next : 'ถัดไป',
            finish : 'บันทึก',
            current : ''
        },
        titleTemplate : '<span class="title">#title#</span>',
        onStepChanging: function (event, currentIndex, newIndex)
        {
            register.validate().settings.ignore = ":disabled,:hidden";
            return register.valid();
        },
        onFinishing: function (event, currentIndex)
        {
            register.validate().settings.ignore = ":disabled";
            return register.valid();
        },
        onFinished: function (event, currentIndex)
        {
            // register.submit(function (e) { 
            //   e.preventDefault();
            //   var isValid = register.valid();
            //   if(isValid){
            //     var data = register.serialize();
            //     $.post(base_url+"apiUser/Users/create", data,
            //       function (data, textStatus, jqXHR) {
            //         console.log(data);
            //         if(data.message == 200){
            //           window.location = base_url+"login";
            //         }else if(data.message == 3001){
            //          showMessage(data.message);
            //         }
            //       }
            //     );
            //   }      
            // });


            event.preventDefault();
            var isValid = register.valid();
            if(isValid){
              // var imageData = $('.image-editor').cropit('export');
              // $('.hidden-image-data').val(imageData);
              var myform = document.getElementById("rigister");
              var formData = new FormData(myform);

              // var data = form.serialize();
              $.ajax({
                url: base_url+"service/Users/create",
                data: formData,
                      processData: false,
                      contentType: false,
                      type: 'POST',
                  success:function (data, textStatus, jqXHR) {
                  console.log(data);
                  if(data.message == 200){
                    window.location = base_url+"login";
                  }else if(data.message == 3001){
                  showMessage(data.message);
                  }
                }
              });
            }
        },
        // onInit : function (event, currentIndex) {
        //     event.append('demo');
        // }
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


        
      var provinceDropdown = $("#provinceId_user");
      provinceDropdown.append('<option value="">เลือกจังหวัด</option>');

      var districtDropdown = $('#districtId_user');
      districtDropdown.append('<option value="">เลือกอำเภอ</option>');

      var subdistrictDropdown = $('#subdistrictId_user');
      subdistrictDropdown.append('<option value="">เลือกตำบล</option>');

      function onLoad(){
        loadProvince();
        loadSparepartProvince();
      }
        onLoad();  

      function loadProvince(){
        $.post(base_url+"service/LocationforRegister/getProvince",{},
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

      $.post(base_url+"service/LocationforRegister/getDistrict",{
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
      
      $.post(base_url+"service/LocationforRegister/getSubdistrict",{
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
      $.post(base_url+"service/LocationforRegister/getProvince",{},
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

      $.post(base_url+"service/LocationforRegister/getDistrict",{
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
      
      $.post(base_url+"service/LocationforRegister/getSubdistrict",{
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

    // register.submit(function (e) { 
    //   e.preventDefault();
    //   var isValid = register.valid();
    //   if(isValid){
    //     var data = register.serialize();
    //     $.post(base_url+"apiUser/Users/create", data,
    //       function (data, textStatus, jqXHR) {
    //         console.log(data);
    //         if(data.message == 200){
    //           window.location = base_url+"login";
    //         }else if(data.message == 3001){
    //          showMessage(data.message);
    //         }
    //       }
    //     );
    //   }      
    // });

  }); 
    
</script>

</body>
</html>