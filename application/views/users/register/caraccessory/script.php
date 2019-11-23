<script>
var form_counter = 0;
function getLocation() {
        navigator.geolocation.getCurrentPosition(function(location) {
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
          checkpassword: { 
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
            checkpassword: {
            required: "รหัสผ่านอีกครั้ง",
            equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
            },
            postCode: {
              required: "รหัสไปรณี"
            }
        }
        //,
        // onfocusout: function(element) {
        //     $(element).valid();
        // },
        // highlight : function(element, errorClass, validClass) {
        //     $(element.register).find('.actions').addClass('form-error');
        //     $(element).removeClass('valid');
        //     $(element).addClass('error');
        // },
        // unhighlight: function(element, errorClass, validClass) {
        //     $(element.register).find('.actions').removeClass('form-error');
        //     $(element).removeClass('error');
        //     $(element).addClass('valid');
        // }
    });

    init();
    
    function init(){
        loadProvinceGarage();
        showForm();
    }
        // user
        var provinceDropdownuser= $("#provinceId_user");
        provinceDropdownuser.append('<option value="">เลือกจังหวัด</option>');

        var districtDropdownuser = $('#districtId_user');
        districtDropdownuser.append('<option value="">เลือกอำเภอ</option>');

        var subdistrictDropdownuser = $('#subdistrictId_user');
        subdistrictDropdownuser.append('<option value="">เลือกตำบล</option>');     

        //sparepart
        var provinceDropdownsparepart = $("#sparepart_provinceId");
        provinceDropdownsparepart.append('<option value="">เลือกจังหวัด</option>');

        var districtDropdownsparepart = $('#sparepart_districtId');
        districtDropdownsparepart.append('<option value="">เลือกอำเภอ</option>');

        var subdistrictDropdownsparepart = $('#sparepart_subdistrictId');
        subdistrictDropdownsparepart.append('<option value="">เลือกตำบล</option>'); 

        function loadProvinceGarage(provinceId, districtId,subdistrictId){
            $.post(base_url+"service/Locationforregister/getProvince",{},
                function(data){
                var province = data.data;
                $.each(province, function( index, value ) {
                    provinceDropdownuser.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
                    provinceDropdownsparepart.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
                });
                }
            );
        }

            provinceDropdownuser.change(function(){
            var provinceId = $(this).val();
            loadDistrictGarage(provinceId);
            });

            provinceDropdownsparepart.change(function(){
            var provinceId = $(this).val();
            loadDistrictsparepart(provinceId);
            });

        function loadDistrictGarage(provinceId, districtId,subdistrictId){
            districtDropdownuser.html("");
            districtDropdownuser.append('<option value="">เลือกอำเภอ</option>');
            subdistrictDropdownuser.html("");
            subdistrictDropdownuser.append('<option value="">เลือกตำบล</option>');

            $.post(base_url+"service/Locationforregister/getDistrict",{
                provinceId: provinceId
            },
                function(data){
                var district = data.data;
                $.each(district, function( index, value ) {
                    districtDropdownuser.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
                });
                }
            );
        }

        function loadDistrictsparepart(provinceId, districtId,subdistrictId){
            districtDropdownsparepart.html("");
            districtDropdownsparepart.append('<option value="">เลือกอำเภอ</option>');
            subdistrictDropdownsparepart.html("");
            subdistrictDropdownsparepart.append('<option value="">เลือกตำบล</option>');

            $.post(base_url+"service/Locationforregister/getDistrict",{
                provinceId: provinceId
            },
                function(data){
                var district = data.data;
                $.each(district, function( index, value ) {
                    districtDropdownsparepart.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
                });
                }
            );
        }

            districtDropdownuser.change(function(){
            var districtId = $(this).val();
            loadSubdistrictGarage(districtId);
            });

            districtDropdownsparepart.change(function(){
            var districtId = $(this).val();
            loadSubdistrictsparepart(districtId);
            });

        function loadSubdistrictGarage(districtId,subdistrictId){
            subdistrictDropdownuser.html("");
            subdistrictDropdownuser.append('<option value="">เลือกตำบล</option>');
                
            $.post(base_url+"service/Locationforregister/getSubdistrict",{
                districtId: districtId
            },
                function(data){
                var subDistrict = data.data;
                $.each(subDistrict, function( index, value ) {
                    subdistrictDropdownuser.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
                });
                }
            );
        }

        function loadSubdistrictsparepart(districtId,subdistrictId){
            subdistrictDropdownsparepart.html("");
            subdistrictDropdownsparepart.append('<option value="">เลือกตำบล</option>');
                
            $.post(base_url+"service/Locationforregister/getSubdistrict",{
                districtId: districtId
            },
                function(data){
                var subDistrict = data.data;
                $.each(subDistrict, function( index, value ) {
                    subdistrictDropdownsparepart.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
                });
                }
            );
        }   

    $("#rigister").submit(function(){
      creates();
    })

    function creates(){
        event.preventDefault();
        var isValid = $("#rigister").valid();
        if(isValid){
            var data = $("#rigister").serialize();
            $.post(base_url+"service/Register/caraccessorys",data,
            function(data){
                if(data.message == 200){
                    showMessage(data.message,"login/");
                }else{
                    showMessage(data.message,);
                }
            });
        }
    }


}); 

function showForm(){
    var html = '<div class="row justify-content-md-center">'
        +'<div class="col-2">'
            +'<button type="button" class="btn btn-main-md width-100p active" onclick="showForm()"><i class="fa fa-chevron-right" aria-hidden="true"></i> ถัดไป </button>'
        +'</div>'
    +'</div>';
    // console.log(".form-show-"+form_counter);
    $(".btn-show").hide("slow");
    $(".form-show-"+form_counter).html(html);
    $(".form-active-"+form_counter).show("slow");
    $(".form-show-"+form_counter).show("slow");
    form_counter++;
}   
    
</script>