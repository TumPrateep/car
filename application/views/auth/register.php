<!DOCTYPE html>

<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

  <title>Register</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/semantic.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>public/css/custom.css">

  <style type="text/css">
    .ui.stacked.segment{
      /*width: 800px !important;*/
      max-width: 750px !important;
      text-align:left !important;
    }
    .ui.form{
      padding-top: 4em !important;
    }
    .ui.middle.aligned.center.container{
        padding-left: 16em ;
      }
    @media only screen and (max-width: 992px) {
      .ui.middle.aligned.center.container{
        padding-left: 0.4em ;
      }
    } 
    

  </style>
  <link href="<?=base_url("/public/vendor/bootstrap/css/bootstrap.min.css") ?>" rel="stylesheet">
  <link href="<?=base_url("/public/vendor/font-awesome/css/font-awesome.min.css") ?>" rel="stylesheet" type="text/css">

  <script src="<?php echo base_url() ?>public/js/jquery.min.js"></script>
  <script src="<?=base_url("/public/vendor/bootstrap/js/bootstrap.bundle.min.js") ?>"></script>
  <script src="<?php echo base_url() ?>public/js/jquery.validate.min.js"></script>
  <script src="<?=base_url("public/js/visibility.js"); ?>"></script>
  <script src="<?=base_url("public/js/sidebar.js"); ?>"></script>
  <script src="<?=base_url("public/js/custom.js"); ?>"></script>
  <script src="<?=base_url("public/js/setup.js"); ?>"></script>

  <script>
  $(document).ready(function() {
    jQuery.validator.addMethod("username", function(value, element) {
      return this.optional( element ) || /^[A-Za-z\d]+$/.test( value );
    }, 'กรุณากรอกภาษาอังกฤษหรือตัวเลขเท่านั้น');
    
    $('#form-register').validate({
      rules: {
        username: {
          required: true,
          username:true,
          minlength:4
        },
          email: {
            email: true
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
        }
      },
      messages: {
        username: {
          required: "กรุณากรอกชื่อผู้ใช้งาน",
          minlength:"กรุณากรอกชื่อผู้ใช้อย่างน้อย 4 ตัวอักษร"
        },
        email: {
          email: "กรุณากรอกอีเมลให้ถูกต้อง"
        },
        phone: {
          required: "กรุณากรอกเบอร์โทรศัพท์",
          minlength:"กรุณากรอกเบอร์โทรศัพท์อย่างน้อย 9 ตัว"
        },
        password: {
          required: "กรุณากรอกรหัสผ่าน",
          minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 6 ตัวอักษร"
        },
        confirmpassword: {
          required: "กรุณากรอกรหัสผ่านอีกครั้ง",
          equalTo: "กรุณาใส่รหัสผ่านให้ตรงกัน"
        }
      }
      
    });
    
    
  });
  </script>
</head>

<body class="pushable">

<!-- Sidebar Menu -->
<div class="ui vertical inverted sidebar menu left">
  <a class="active item">Home</a>
  <a class="item">อู่รถยนต์</a>
  <a class="item">ช่างซ่อม</a>
  <a class="item">นัดหมาย</a>
  <a class="item">คลังอะไหล่</a>
  <a class="item">ข้อมูลส่วนตัว</a>
  <a class="item" href="<?=base_url("/auth/register") ?>">สมัครใช้งาน</a>
  <a class="item" href="<?=base_url("/auth/login") ?>">ลงชื่อเข้าใช้</a>
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
  <div class="ui middle aligned center container ">
    <form class="ui form " id="form-register">
      <div class="ui stacked segment ">
        <div class="field">
            <h2 class="ui container center header">สมัครเข้าใช้งาน</h2>
        </div>
        <div class="ui red message text-left hide" id="error-message">ชื่อผู้ใช้ซ้ำ</div>
        <div class="field"><label>ชื่อผู้ใช้งาน<span class="error">*</span></label>
            <input class="ui input" type="text" id="username" name="username" placeholder="ชื่อผู้ใช้งาน">
        </div>
        <div class="field"><label>เบอร์โทรศัพท์<span class="error">*</span></label>
            <input type="text" id="phone" name="phone" placeholder="เบอร์โทรศัพท์">
        </div>
        <div class="field"><label>อีเมล์</label>
            <input type="text" id="email" name="email" placeholder="อีเมล์">
        </div>
        <div class="field"><label>รหัสผ่าน<span class="error">*</span></label>
            <input type="password" id="password" name="password" placeholder="รหัสผ่าน">
        </div>
        <div class="field"><label>ยืนยันรหัสผ่าน<span class="error">*</span></label>
            <input type="password" id="confirmpassword" name="confirmpassword" placeholder="ยืนยันรหัสผ่าน">
        </div>
        <div class="field">
            <button class="ui green button" type="submit" id="register">สมัคร</button>
        </div>
        <div class="ui error message"></div>
      </div>
      
    </form>
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
        <h6 class="text-center" id="content-success">บันทึกสำเร็จ</h6> 
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

<div class="modal-loading" id="loading">
  <div class="modal-loading-content">
    <div class="cssload-bell">
        <div class="cssload-circle">
          <div class="cssload-inner"></div>
        </div>
        <div class="cssload-circle">
          <div class="cssload-inner"></div>
        </div>
        <div class="cssload-circle">
          <div class="cssload-inner"></div>
        </div>
        <div class="cssload-circle">
          <div class="cssload-inner"></div>
        </div>
        <div class="cssload-circle">
          <div class="cssload-inner"></div>
        </div>
    </div>
  </div>
</div>

    <script>
    $(document).ready(function(){

      $("#form-register").submit(function(){
        register();
            
      })

      $("#register").click(function(){
        register();
      })

      function register(){
        event.preventDefault();
        var isValid = $("#form-register").valid();
        $("#error-message").hide();
        if(isValid){
          var data = $("#form-register").serialize();
          $.post(base_url+"api/register/register",data,
            function(data){
              if(data.message == 200){
                showMessage(data.message,"auth/login");
              }else{
                showMessage(data.message);
              }
            }
          )
          .fail(function(data) {
            if(data.responseJSON.message == 3001){
              $("#error-message").show();
            }
          })
        }
      
      }

    });

    $("#success-modal").on('hidden.bs.modal', function () {
      window.location.assign(base_url+"auth/login");
    });
    
  </script>

</body>
</html>