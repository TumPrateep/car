
<!DOCTYPE html>
<!-- saved from url=(0046)https://semantic-ui.com/examples/homepage.html -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <!-- Standard Meta -->
  
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <!-- Site Properties -->
  <title>Homepage - Semantic</title>
  <link rel="stylesheet" type="text/css" href="<?=base_url("public/css/semantic.min.css"); ?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url("public/css/custom.css"); ?>">
  <link href="<?=base_url("/public/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?=base_url("public/css/smart_wizard.css"); ?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url("public/css/smart_wizard_theme_dots.css"); ?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url("public/css/image-picker.css"); ?>">
  <link href="<?=base_url("/public/vendor/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css">

</head>
<body class="pushable">

<!-- Following Menu -->
<div class="ui large top fixed hidden menu">
  <div class="ui container">
    <a class="active item">Home</a>
    <a class="item">อู่รถยนต์</a>
    <a class="item">ช่างซ่อม</a>
    <a class="item">นัดหมาย</a>
    <a class="item">คลังอะไหล่</a>
    <a class="item">ข้อมูลส่วนตัว</a>
    <div class="right menu">
      <div class="item">
        <a class="ui button">สมัครใช้งาน</a>
      </div>
      <div class="item">
        <a class="ui primary button">ลงชื่อเข้าใช้</a>
      </div>
    </div>
  </div>
</div>

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu left">
  <a class="active item">Home</a>
  <a class="item">อู่รถยนต์</a>
  <a class="item">ช่างซ่อม</a>
  <a class="item">นัดหมาย</a>
  <a class="item">คลังอะไหล่</a>
  <a class="item">ข้อมูลส่วนตัว</a>
</div>

<div id="top-menu" class="pusher">

  <div class="ui inverted vertical masthead center aligned segment">

    <div class="ui container">
      <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
        <a class="active item">Home</a>
        <a class="item">อู่รถยนต์</a>
        <a class="item">ช่างซ่อม</a>
        <a class="item">นัดหมาย</a>
        <a class="item">คลังอะไหล่</a>
        <a class="item">ข้อมูลส่วนตัว</a>
        <div class="right item">
          <a class="blue ui head-logo"><i class="black car icon"></i>CarJaidee.com</a>
          <a class="ui red button head-button " href="<?=base_url("/auth/register") ?>">สมัครใช้งาน</a>
          <a class="ui primary button head-button" href="<?=base_url("/auth/login") ?>">ลงชื่อเข้าใช้</a>
        </div>
      </div>
    </div>

  </div>
</div>

<div class="pusher">
  <div class="ui stackable one column grid container">
    <div class="column ui stacked segment container register step">
      <!-- SmartWizard html -->
      <div id="smartwizard">
          <ul>
              <li><a href="#step-1">Step 1<br /><small>ข้อมูลส่วนตัว</small></a></li>
              <li><a href="#step-2">Step 2<br /><small>ประเภทผู้ใช้งาน</small></a></li>
              <li><a href="#step-3">Step 3<br /><small>ข้อมูลเพิ่มเติม</small></a></li>
          </ul>

          <div id="content" style="min-height:30px !important">
                <div id="step-1">
                    <h4>ข้อมูลส่วนตัว</h4>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <form id="form-1">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>ชื่อ</label><span class="error">*</span>
                              <input type="text" name="firstname" id="firstname" class="form-control" placeholder="ชื่อ">
                            </div>
                            <div class="form-group col-md-6">
                              <label>นามสกุล</label><span class="error">*</span>
                              <input type="text" name="lastname" id="lastname" class="form-control" placeholder="นามสกุล">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>ที่อยู่</label><span class="error">*</span>
                            <textarea class="form-control" name="address" id="address" rows="3"></textarea>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>จังหวัด</label><span class="error">*</span>
                              <select class="form-control" name="provinceId" id="provinceId"></select>
                            </div>
                            <div class="form-group col-md-4">
                              <label>อำเภอ</label><span class="error">*</span>
                              <select class="form-control" name="districtId" id="districtId"></select>
                            </div>
                            <div class="form-group col-md-4">
                              <label>ตำบล</label><span class="error">*</span>
                              <select class="form-control" name="subdistrictId" id="subdistrictId"></select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>เบอร์โทรศัพท์</label>
                              <input type="text" name="phone1" id="phone1" class="form-control" placeholder="เบอร์โทรศัพท์">
                            </div>
                            <div class="form-group col-md-6">
                              <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                              <input type="text" name="phone2" id="phone2" class="form-control" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้">
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
              
                <div id="step-2">
                    <h4>ข้อมูลส่วนตัว</h4>
                    <div id="form-step-1" role="form" data-toggle="validator">
                      <form id="form-2">
                        <div class="form-group text-center">
                          <select id="role" class="image-picker show-html" name="role">
                            <option data-img-src="<?=base_url("public/image/role/4.jpg");?>" value="4" selected>ผู้ใช้งาน</option>
                            <option data-img-src="<?=base_url("public/image/role/3.jpg");?>" value="3">อู่</option>
                            <option data-img-src="<?=base_url("public/image/role/2.jpg");?>" value="2">ร้านอะไหล่</option>
                          </select>
                        </div>
                      </form>
                    </div>
                </div>

                <div id="step-3">
                    <div id="form-step-2" role="form" data-toggle="validator">
                    <div id="role-4" style="display:none">  
                      <h5>ข้อมูลรถ</h5><label>ทะเบียนรถ</label><span class="error">*</span>
                      <form id="form-role-4">
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>ตัวอักษรนำหน้า</label><span class="error">*</span>
                              <input type="text" name="characterPlate" id="characterPlate" class="form-control" placeholder="ตัวอักษรนำหน้า">
                            </div>
                            <div class="form-group col-md-4">
                              <label>ตัวเลข</label><span class="error">*</span>
                              <input type="text" name="numberPlate" id="numberPlate" class="form-control" placeholder="ตัวเลข">
                            </div>
                            <div class="form-group col-md-4">
                              <label>จังหวัด</label><span class="error">*</span>
                              <input type="text" name="provincePlate" id="provincePlate" class="form-control" placeholder="จังหวัด">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>เลขไมล์</label><span class="error">*</span>
                              <input type="text" name="mileage" id="mileage" class="form-control" placeholder="เลขไมล์">
                            </div>
                            <div class="form-group col-md-6">
                              <label>สี</label><span class="error">*</span>
                              <input type="text" name="colorCar" id="colorCar" class="form-control" placeholder="สีรถ">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>รูปด้านหน้ารถ </label>
                              <input type="file" class="form-control-file" name="frontPicture" id="frontPicture">
                              <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                            </div>
                            <div class="form-group col-md-4">
                              <label>รูปด้านหลังรถ </label>
                              <input type="file" class="form-control-file" name="backPicture" id="backPicture">
                              <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                            </div>
                            <div class="form-group col-md-4">
                              <label>รูปป้ายวงกลม </label>
                              <input type="file" class="form-control-file" name="circlesignPicture" id="circlesignPicture">
                              <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                            </div>
                          </div>
                        </form>
                      </div>
                      
                      <div id="role-3" style="display:none">
                        <h5>ข้อมูลอู่</h5>
                        <form id="form-role-3">  
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>ชื่ออู่</label><span class="error">*</span>
                                <input type="text" class="form-control" name="garageName" id="garageName" placeholder="ชื่ออู่" >
                              </div>
                              <div class="form-group col-md-6">
                                <label>ใบทะเบียนการค้า</label>
                                <input type="text" class="form-control" name="businessRegistration" id="businessRegistration" placeholder="ใบทะเบียนการค้า">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-12">
                                <label>ที่อยู่</label><span class="error">*</span>
                                <textarea class="form-control" name="addressGarage" id="addressGarage" placeholder="ที่อยู่" rows="3"></textarea>
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>จังหวัด</label><span class="error">*</span>
                              <select class="form-control" name="garage-provinceId" id="garage-provinceId"></select>
                            </div>
                            <div class="form-group col-md-4">
                              <label>อำเภอ</label><span class="error">*</span>
                              <select class="form-control" name="garage-districtId" id="garage-districtId"></select>
                            </div>
                            <div class="form-group col-md-4">
                              <label>ตำบล</label><span class="error">*</span>
                              <select class="form-control" name="garage-subdistrictId" id="garage-subdistrictId"></select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>รหัสไปรษณีย์</label><span class="error">*</span>
                              <input type="text" class="form-control" name="zipCode" id="zipCode" placeholder="รหัสไปรษณีย์">
                            </div>
                            <div class="form-group col-md-4">
                              <label>ละติจูด</label>
                              <input type="text" class="form-control" name="latitude" id="latitude" placeholder="ละติจูด">
                            </div>
                            <div class="form-group col-md-4">
                              <label>ลองจิจูด</label>
                              <input type="text" class="form-control" name="longtitude" id="longtitude" placeholder="ลองจิจูด">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>คำอธิบาย</label>
                            <textarea class="form-control" name="comment" id="comment" rows="3"></textarea>
                          </div>
                          <label>สิ่งอำนวยความสะดวก</label>
                          <div class="form-row"> 
                            <div class="form-group">
                              <div class="form-check panding">
                                <input class="form-check-input" type="checkbox" id="box1">
                                <label class="form-check-label">Wifi</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="box2">
                                <label class="form-check-label">ห้องพัก-เเอร์</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="box3">
                                <label class="form-check-label">ห้องพักพัดลม</label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="box4">
                                <label class="form-check-label">ที่นั่งรอ-พัดลม</label>
                              </div>
                            </div>
                            <div class="form-group col-md-12">
                              <input type="text" class="form-control" name="other" id="other" placeholder="อื่นๆ">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>รูปภาพของอู่ </label>
                              <input type="file" class="form-control-file" name="garagePicture" id="garagePicture">
                              <small id="fileHelp" class="form-text text-muted">เลือกรูปภาพที่นามสกุล .jpg</small>
                            </div>
                          </div>
                        </form>
                      </div>

                      <div id="role-2" style="display:none">
                        <h5>ข้อมูลร้านอะไหล่</h5>
                        <form id="form-role-2">
                          <div class="form-row">
                              <div class="form-group col-md-6">
                                <label>ชื่อร้านค้าส่ง</label><span class="error">*</span>
                                <input type="text" class="form-control" name="car_accessoriesName" id="car_accessoriesName" placeholder="ชื่ออู">
                              </div>
                              <div class="form-group col-md-6">
                                <label>ใบทะเบียนการค้า</label><span class="error">*</span>
                                <input type="text" class="form-control" name="businessRegistration" id="businessRegistrationAccessories" placeholder="ใบทะเบียนการค้">
                              </div>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
          </div>
      </div>
        
    </div>
  </div>
</div>

<div class="modal fade" id="success-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-success">บันทึกสำเร็จ</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-check text-success "></i></h1>
            <h6 class="text-center" id="content-success">Success</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Warning Modal-->
    <div class="modal fade" id="warning-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-warning">Warning</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-exclamation text-warning "></i></h1>
            <h6 class="text-center" id="content-warning">Warning</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>
    <!-- Danger Modal-->
    <div class="modal fade" id="danger-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="lebel-danger">Danger</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body" >
            <h1 class="display-3 text-center"><i class="fa fa-times text-danger "></i></h1>
            <h6 class="text-center" id="content-danger">Danger</h6> 
          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">ปิด</button>
          </div>
        </div>
      </div>
    </div>



<script src="<?=base_url("public/js/jquery.min.js"); ?>"></script>
<script src="<?=base_url("public/js/semantic.min.js");?>"></script>
<script src="<?=base_url("public/js/visibility.js"); ?>"></script>
<script src="<?=base_url("public/js/sidebar.js"); ?>"></script>
<script src="<?=base_url("public/js/custom.js"); ?>"></script>
<script src="<?=base_url("/public/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
<script src="<?=base_url("public/js/popper.min.js"); ?>"></script>
<script src="<?=base_url("public/js/jquery.smartWizard.js"); ?>"></script>
<script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url() ?>public/js/image-picker.js"></script>
<script src="<?php echo base_url() ?>public/js/setup.js"></script>

<script type="text/javascript">
    $(document).ready(function(){

        var provinceDropdown = $("#provinceId");
        provinceDropdown.append('<option value="">เลือกจังหวัด</option>');

        var districtDropdown = $('#districtId');
        districtDropdown.append('<option value="">เลือกอำเภอ</option>');

        var subdistrictDropdown = $('#subdistrictId');
        subdistrictDropdown.append('<option value="">เลือกตำบล</option>');
        
        function onLoad(){
          loadProvince();
        }

        onLoad();

        function loadProvince(){
          $.post(base_url+"api/location/getProvince",{},
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

          $.post(base_url+"api/location/getDistrict",{
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
          
          $.post(base_url+"api/location/getSubdistrict",{
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
        jQuery.validator.addMethod("numberPlate", function(value, element) {
            return this.optional( element ) || /^[0-9]*$/.test( value );
          }, 'กรุณากรอกตัวเลขเท่านั้น');
          
        
        jQuery.validator.addMethod("mileage", function(value, element) {
            return this.optional( element ) || /^[0-9]*$/.test( value );
        }, 'กรุณากรอกตัวเลขเท่านั้น');

        jQuery.validator.addMethod("zipCode", function(value, element) {
            return this.optional( element ) || /^[0-9]*$/.test( value );
          }, 'กรุณากรอกตัวเลขเท่านั้น');
        $("#form-role-4").validate({
          rules:{
            licensePlate: {
              required: true
            },
            mileage: {
              required: true,
              mileage:true
            },
            colorCar: {
              required: true
            },
            characterPlate: {
              required: true
            },
            numberPlate: {
              required: true,
              numberPlate:true
            },
            provincePlate: {
              required: true
            }
            // ,
            // frontPicture:{
            //   required: true
            // },
            // backPicture:{
            //   required: true
            // },
            // circlesignPicture:{
            //   required: true
            // }
          },
          messages:{
            licensePlate: {
              required: "กรุณากรอกทะเบียนรถ"
            },
            mileage: {
              required: "กรุณากรอกจำนวนเลขไมล์"
            },
            colorCar: {
              required: "กรุณากรอกสีรถ"
            },
            characterPlate: {
              required: "กรุณากรอกตัวอักษรป้ายทะเบียน"
            },
            numberPlate: {
              required: "กรุณากรอกตัวเลขป้ายทะเบียน"
            },
            provincePlate: {
              required: "กรุณากรอกจังหวัด"
            }
          }
        });

        $("#form-role-3").validate({
          rules:{
            garageName:{
              required: true
            },
            businessRegistration:{
              required: true
            },
            addressGarage:{
              required: true
            },
            "garage-provinceId":{
              required: true
            },
            "garage-districtId":{
              required: true
            },
            "garage-subdistrictId":{
              required: true
            },
            "zipCode":{
              required: true,
              zipCode :true 
            }
          },
          messages:{
            garageName:{
              required: "กรุณากรอกชื่ออู่"
            },
            businessRegistration:{
              required: "กรุณากรอกใบทะเบียนการค้า"
            },
            addressGarage:{
              required: "กรุณากรอกที่อยู่"
            },
            "garage-provinceId":{
              required: "กรุณาเลือกจังหวัด"
            },
            "garage-districtId":{
              required: "กรุณาเลือกอำเภอ"
            },
            "garage-subdistrictId":{
              required: "กรุณาเลือกตำบล"
            },
            zipCode:{
              required: "กรุณากรอกรหัสไปรษณีย์"
            }
          }
        });

        $("#form-role-2").validate({
          rules:{
            car_accessoriesName:{
              required: true
            },
            businessRegistration:{
              required: true
            }
          },
          messages:{
            car_accessoriesName:{
              required: "กรุณากรอกชื่อร้านค้าส่ง"
            },
            businessRegistration:{
              required: "กรุณากรอกใบทะเบียนการค้า"
            }
          }
        });

        function finish(){
          var role = $("#role").val();
          var id = "#form-role-"+role;
          var isValid = $(id).valid();
          if(isValid){
            var formData = new FormData();
            formData.append("role",role);
            
            var profileData = $("#form-1").serializeArray();
            $.each(profileData, function( index, value ) {
              formData.append(value.name, value.value);
            });

            if(role == "3"){ //อู่
              formData.append("garageName", $("#garageName").val());
              formData.append("businessRegistration", $("#businessRegistration").val());
              formData.append("garageAddress", $("#addressGarage").val());
              formData.append("provinceId", $("#garage-provinceId").val());
              formData.append("districtId", $("#garage-districtId").val());
              formData.append("subdistrictId", $("#garage-subdistrictId").val());
              formData.append("postCode", $("#zipCode").val());
              formData.append("latitude", $("#latitude").val());
              formData.append("longtitude", $("#longtitude").val());
              formData.append("comment", $("#comment").val());
              var isCheckBox1 = $("#box1").is(':checked');
              var isCheckBox2 = $("#box2").is(':checked');
              var isCheckBox3 = $("#box3").is(':checked');
              var isCheckBox4 = $("#box4").is(':checked');
              var checkBox1 = (isCheckBox1)?1:2;
              var checkBox2 = (isCheckBox2)?1:2;
              var checkBox3 = (isCheckBox3)?1:2;
              var checkBox4 = (isCheckBox4)?1:2;
              formData.append("option1", checkBox1);
              formData.append("option2", checkBox2);
              formData.append("option3", checkBox3);
              formData.append("option4", checkBox4);
              formData.append("option_other", $("#other").val());
              formData.append("garagePicture", $("#garagePicture")[0].files[0]);
            }else if(role == "2"){ //ร้านค้าอะไหล่
              formData.append("car_accessoriesName", $("#car_accessoriesName").val());
              formData.append("businessRegistrationAccessories", $("#businessRegistrationAccessories").val());
            }else{
              formData.append("frontPicture", $("#frontPicture")[0].files[0]);
              formData.append("backPicture", $("#backPicture")[0].files[0]);
              formData.append("circlesignPicture", $("#circlesignPicture")[0].files[0]);
              formData.append("characterPlate", $("#characterPlate").val());
              formData.append("numberPlate", $("#numberPlate").val());
              formData.append("provincePlate", $("#provincePlate").val());
              formData.append("mileage", $("#mileage").val());
              formData.append("colorCar", $("#colorCar").val());
            }

            $.ajax({
                url: base_url+"api/UserManagement/userTypeAndData",
                data: formData,
                processData: false,
                contentType: false,
                type: 'POST',
                success: function (data) {
                    if(data.message == 200){
                        showMessage(data.message,"role");
                    }else{
                        showMessage(data.message);
                    }
                }
            });

          }
        }

        $("#role").imagepicker({
          show_label: true
        });
        // Toolbar extra buttons
        var btnFinish = $('<button disabled></button>').text('เสร็จสิ้น')
                .addClass('btn btn-info btn-finish')
                .on('click', function(){
                  finish();
                });
        var btnCancel = $('<button></button>').text('ยกเลิก')
                .addClass('btn btn-danger')
                .on('click', function(){ 
                  window.location.assign(base_url+"Auth/logout");
                });
        
        $('#smartwizard').smartWizard({
            selected: 0,
            theme: 'dots',
            transitionEffect:'fade',
            // showStepURLhash: true,
            toolbarSettings: {
                // toolbarPosition: 'both',
                toolbarButtonPosition: 'end',
                toolbarExtraButtons: [btnFinish, btnCancel]
            },
            anchorSettings: {
                markDoneStep: true, // add done css
                markAllPreviousStepsAsDone: true, // When a step selected by url hash, all previous steps are marked done
                // removeDoneStepOnNavigateBack: true, // While navigate back done step after active step will be cleared
                enableAnchorOnDoneStep: true // Enable/Disable the done steps navigation
            }
        });

        $('#smartwizard').smartWizard("reset");
        
        $("#form-1").validate({
          rules:{
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
            phone2: {
              required: true
            }
          },
          messages:{
            firstname: {
              required: "กรุณากรอกชื่อ"
            },
            lastname: {
              required: "กรุณากรอกนามสกุล"
            },
            address:{
              required: "กรุณากรอกที่อยู่"
            },
            provinceId:{
              required: "กรุณาเลือกจังหวัด"
            },
            districtId: {
              required: "กรุณาเลือกอำเภอ"
            },
            subdistrictId: {
              required: "กรุณาเลือกตำบล"
            },
            phone2: {
              required: "กรุณากรอกเบอร์โทรที่สามารถติดต่อได้"
            }
          }
        });

        $("#form-2").validate({
          rules:{
            role: {
              required: true
            }
          },
          messages:{
            role: {
              required: "กรุณาเลือกประเภทผู้ใช้งาน"
            }
          }
        });

        $("#smartwizard").on("leaveStep", function(e, anchorObject, stepNumber, stepDirection) {
            var elmForm = $("#form-step-" + stepNumber);
            // stepDirection === 'forward' :- this condition allows to do the form validation
            // only on forward navigation, that makes easy navigation on backwards still do the validation when going next
            if(stepDirection === 'forward' && elmForm){ 
                var id = "#form-"+(stepNumber+1);
                var isValid = $(id).valid();
                return isValid;
            }
            return true;
        });

        $("#smartwizard").on("showStep", function(e, anchorObject, stepNumber, stepDirection) {
            // Enable finish button only on last step
            if(stepNumber == 2){
                showRole();
                $('.btn-finish').prop('disabled', false);
            }else{
                $('.btn-finish').prop('disabled', true);
            }
        });

        function showRole(){
          var role = $("#role").val();
          clear();
          if(role == '2'){
            $("#role-2").show();
          }else if(role == '3'){
            $("#role-3").show();
            loadGarageProvince();
          }else{
            $("#role-4").show();
          }
          // $("#content").css("min-height", "138px");
        }

        function clear(role){
          $("#role-4").hide();
          $("#role-3").hide();
          $("#role-2").hide();
        }
    });

    var garageProvinceDropdown = $("#garage-provinceId");
    garageProvinceDropdown.append('<option value="">เลือกจังหวัด</option>');

    var garageDistrictDropdown = $('#garage-districtId');
    garageDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');

    var garageSubdistrictDropdown = $('#garage-subdistrictId');
    garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

    function loadGarageProvince(){
      $.post(base_url+"api/location/getProvince",{},
        function(data){
          var province = data.data;
          $.each(province, function( index, value ) {
            garageProvinceDropdown.append('<option value="'+value.provinceId+'">'+value.provinceName+'</option>');
          });
        }
      );
    }

    garageProvinceDropdown.change(function(){
      var provinceId = $(this).val();
      loadGarageDistrict(provinceId);
    });

    function loadGarageDistrict(provinceId){
      garageDistrictDropdown.html("");
      garageDistrictDropdown.append('<option value="">เลือกอำเภอ</option>');
      garageSubdistrictDropdown.html("");
      garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');

      $.post(base_url+"api/location/getDistrict",{
        provinceId: provinceId
      },
        function(data){
          var district = data.data;
          $.each(district, function( index, value ) {
            garageDistrictDropdown.append('<option value="'+value.districtId+'">'+value.districtName+'</option>');
          });
        }
      );

    }

    garageDistrictDropdown.change(function(){
      var districtId = $(this).val();
      loadGarageSubdistrict(districtId);
    });

    function loadGarageSubdistrict(districtId){
      garageSubdistrictDropdown.html("");
      garageSubdistrictDropdown.append('<option value="">เลือกตำบล</option>');
      
      $.post(base_url+"api/location/getSubdistrict",{
        districtId: districtId
      },
        function(data){
          var subDistrict = data.data;
          $.each(subDistrict, function( index, value ) {
            garageSubdistrictDropdown.append('<option value="'+value.subdistrictId+'">'+value.subdistrictName+'</option>');
          });
        }
      );

    }
</script>


</body>
</html>