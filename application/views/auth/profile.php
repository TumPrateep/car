
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
          <a class="ui red button head-button">สมัครใช้งาน</a>
          <a class="ui primary button head-button">ลงชื่อเข้าใช้</a>
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
              <li><a href="#step-1">Step 1<br /><small>Email Address</small></a></li>
              <li><a href="#step-2">Step 2<br /><small>Name</small></a></li>
              <li><a href="#step-3">Step 3<br /><small>Address</small></a></li>
          </ul>

          <div>
                <div id="step-1">
                    <h4>ข้อมูลส่วนตัว</h4>
                    <div id="form-step-0" role="form" data-toggle="validator">
                        <form id="form-1">
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>ชื่อ</label><span class="error">*</span>
                              <input type="text" name="firstname" class="form-control" placeholder="ชื่อ">
                            </div>
                            <div class="form-group col-md-6">
                              <label>นามสกุล</label><span class="error">*</span>
                              <input type="text" name="lastname" class="form-control" placeholder="นามสกุล">
                            </div>
                          </div>
                          <div class="form-group">
                            <label>ที่อยู่:</label><span class="error">*</span>
                            <textarea class="form-control" name="address" rows="3"></textarea>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-4">
                              <label>จังหวัด</label><span class="error">*</span>
                              <select class="form-control" name="provinceId">
                                <option>เลือกจังหวัด</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                              <label>อำเภอ</label><span class="error">*</span>
                              <select class="form-control" name="districtId">
                                <option>เลือกอำเภอ</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4">
                              <label>ตำบล</label><span class="error">*</span>
                              <select class="form-control" name="subdistrictId">
                                <option>เลือกตำบล</option>
                              </select>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <label>เบอร์โทรศัพท์</label>
                              <input type="text" name="phone1" class="form-control" placeholder="เบอร์โทรศัพท์">
                            </div>
                            <div class="form-group col-md-6">
                              <label>เบอร์โทรศัพท์ที่สามารถติดต่อได้</label><span class="error">*</span>
                              <input type="text" name="phone2" class="form-control" placeholder="เบอร์โทรศัพท์ที่สามารถติดต่อได้">
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
                            <option value=""></option>
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
                    <h5>ทะเบียนรถ</h5>
                      <form id="form-3">
                        <div id="role-4">  
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>ตัวอักษรนำหน้า</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="ตัวอักษรนำหน้า">
                              </div>
                              <div class="form-group col-md-4">
                                <label>ตัวเลข</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="ตัวเลข">
                              </div>
                              <div class="form-group col-md-4">
                                <label>จังหวัด</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="จังหวัด">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>เลขไมล์</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="เลขไมล์">
                              </div>
                              <div class="form-group col-md-4">
                                <label>สี</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="สี">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>รูปด้านหน้ารถ</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปด้านหน้ารถ">
                              </div>
                              <div class="form-group col-md-4">
                                <label>รูปด้านหลังรถ</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปด้านหลังรถ">
                              </div>
                              <div class="form-group col-md-4">
                                <label>รูปป้ายวงกลม</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปป้ายวงกลม">
                              </div>
                          </div>
                        </div>
                        <hr>
                        <div id="role-4">  
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>ตัวอักษรนำหน้า</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="ตัวอักษรนำหน้า">
                              </div>
                              <div class="form-group col-md-4">
                                <label>ตัวเลข</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="ตัวเลข">
                              </div>
                              <div class="form-group col-md-4">
                                <label>จังหวัด</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="จังหวัด">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>เลขไมล์</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="เลขไมล์">
                              </div>
                              <div class="form-group col-md-4">
                                <label>สี</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="สี">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>รูปด้านหน้ารถ</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปด้านหน้ารถ">
                              </div>
                              <div class="form-group col-md-4">
                                <label>รูปด้านหลังรถ</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปด้านหลังรถ">
                              </div>
                              <div class="form-group col-md-4">
                                <label>รูปป้ายวงกลม</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปป้ายวงกลม">
                              </div>
                          </div>
                        </div>
                        <hr>
                        <div id="role-4">  
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>ตัวอักษรนำหน้า</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="ตัวอักษรนำหน้า">
                              </div>
                              <div class="form-group col-md-4">
                                <label>ตัวเลข</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="ตัวเลข">
                              </div>
                              <div class="form-group col-md-4">
                                <label>จังหวัด</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="จังหวัด">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>เลขไมล์</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="เลขไมล์">
                              </div>
                              <div class="form-group col-md-4">
                                <label>สี</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="สี">
                              </div>
                          </div>
                          <div class="form-row">
                              <div class="form-group col-md-4">
                                <label>รูปด้านหน้ารถ</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปด้านหน้ารถ">
                              </div>
                              <div class="form-group col-md-4">
                                <label>รูปด้านหลังรถ</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปด้านหลังรถ">
                              </div>
                              <div class="form-group col-md-4">
                                <label>รูปป้ายวงกลม</label><span class="error">*</span>
                                <input type="text" class="form-control" placeholder="รูปป้ายวงกลม">
                              </div>
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

<script type="text/javascript">
    $(document).ready(function(){
        $("#role").imagepicker({
          show_label: true
        });
        // Toolbar extra buttons
        var btnFinish = $('<button disabled></button>').text('Finish')
                .addClass('btn btn-info btn-finish')
                .on('click', function(){ alert('Finish Clicked'); });
        var btnCancel = $('<button></button>').text('Cancel')
                .addClass('btn btn-danger')
                .on('click', function(){ $('#smartwizard').smartWizard("reset"); });
        
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

        // $('#smartwizard').smartWizard("reset");
        
        $("#form-1").validate({
          rules:{
            firstname: {
              required: true
            }
          },
          messages:{
            firstname: {
              required: "กรุณากรอกชื่อ"
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
          render(role);
        }

        function render(role){
          // $("#form-3").html(role);
        }
    });
</script>
</body>
</html>